<?php

namespace App\Controller;

use App\Entity\Parentt;
use App\Form\ParenttFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('invit/inscription.html.twig');
    }

    /**
     * @Route("/inscription", name="app-inscription")
     */
    public function createParentt(Request $request) : Response
    {
        $parentt = new Parentt();

        $form = $this->createForm(ParenttFormType::class, $parentt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($parentt);
            $em->flush();

            return $this->redirectToRoute('app-inscription', [
                'form' => $form->createView()
            ]);

        }

        return $this->render('invit/subs.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
