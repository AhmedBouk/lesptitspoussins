<?php


namespace App\Controller;


use App\Entity\EnfantProfil;
use App\Entity\Parentt;
use App\Form\EnfantFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EnfantController extends AbstractController
{

    /**
     * @Route("/parent/enfant/créer", name="créerenfant")
     */
    public function nouvelEnfant(Request $request)
    {
        $enfant = new EnfantProfil();

        $form = $this->createForm(EnfantFormType::class, $enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();

            return $this->redirectToRoute('dashboardparent', [
            ]);
        }

        return $this->render('parent/profil_child.html.twig', [
            'form' => $form->createView()
        ]);


    }

}