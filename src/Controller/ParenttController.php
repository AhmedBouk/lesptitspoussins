<?php


namespace App\Controller;


use App\Entity\Parentt;
use App\Form\ParenttFormType;
use App\Repository\ParenttRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ParenttController extends AbstractController
{

    /**
     * @Route("/parent/{id}/dashboard", name="dashboardparent")
     */
    public function dashboardparentt(ParenttRepository $parenttRepository, Parentt $parentt)
    {
        $enfant = $parenttRepository->findByEnfant($parentt->getId());

        print_r($enfant);
        return $this->render('parent/dashboard.html.twig');
    }

    /**
     * @Route("/parent/profil/{id}/edit", name="editparent")
     */
    public function editparentt(Request $request, Parentt $parentt)
    {
        $form = $this->createForm(ParenttFormType::class, $parentt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dashboardparent', [
                'id' => $parentt->getId(),
            ]);
        }

        return $this->render('parent/profil_parent.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}