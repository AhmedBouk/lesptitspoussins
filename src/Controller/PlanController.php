<?php


namespace App\Controller;


use App\Entity\Plan;
use App\Entity\ProProfil;
use App\Form\PlanFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PlanController extends AbstractController
{

    /**
     * @Route("/pro/{id}/planning/{planning_id}/modif", name="modifplanning")
     *
     * @ParamConverter("plan", options={"id" = "planning_id"})
     */
    public function editPlanning(Request $request, Plan $plan, ProProfil $proProfil)
    {
        $id = $proProfil->getId();

        $form = $this->createForm(PlanFormType::class, $plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $plan->setProProfil($proProfil);

            $em = $this->getDoctrine()->getManager();
            $em->persist($plan);
            $em->flush();

            return $this->redirectToRoute('voirplanning', [
                'id' => $id
            ]);
        }

        return $this->render('plan/modifplanning.html.twig', [
            'form' => $form->createView()
        ]);

    }


    public function deletePlanning()
    {

    }

}