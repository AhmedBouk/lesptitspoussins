<?php

namespace App\Controller;

use App\Entity\ProProfil;
use App\Form\ProProfilType;
use App\Repository\ProProfilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pro/profil")
 */
class ProProfilController extends AbstractController
{
    /**
     * @Route("/", name="pro_profil_index", methods={"GET"})
     */
    public function index(ProProfilRepository $proProfilRepository): Response
    {
        return $this->render('pro_profil/index.html.twig', [
            'pro_profils' => $proProfilRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pro_profil_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $proProfil = new ProProfil();
        $form = $this->createForm(ProProfilType::class, $proProfil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($proProfil);
            $entityManager->flush();

            return $this->redirectToRoute('pro_profil_index');
        }

        return $this->render('pro_profil/new.html.twig', [
            'pro_profil' => $proProfil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pro_profil_show", methods={"GET"})
     */
    public function show(ProProfil $proProfil): Response
    {
        return $this->render('pro_profil/show.html.twig', [
            'pro_profil' => $proProfil,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pro_profil_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProProfil $proProfil): Response
    {
        $form = $this->createForm(ProProfilType::class, $proProfil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pro_profil_index', [
                'id' => $proProfil->getId(),
            ]);
        }

        return $this->render('pro_profil/edit.html.twig', [
            'pro_profil' => $proProfil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pro_profil_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProProfil $proProfil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$proProfil->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($proProfil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pro_profil_index');
    }
}
