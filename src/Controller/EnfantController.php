<?php


namespace App\Controller;


use App\Entity\EnfantProfil;
use App\Entity\Parentt;
use App\Form\EnfantFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class EnfantController extends AbstractController
{

    /**
     * @Route("/parent/enfant/créer", name="créerenfant")
     */
    public function nouvelEnfant(Request $request, AuthenticationUtils $authenticationUtils) : Response
    {
        $enfant = new EnfantProfil();
        $error = $authenticationUtils->getLastAuthenticationError();


        $form = $this->createForm(EnfantFormType::class, $enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();

            $this->addFlash('success', 'L\'Enfant a bien été enregistré');

            return $this->redirectToRoute('dashboardparent', [
                'id' => $request->getSession('id')
            ]);
        }

        return $this->render('parent/profil_child.html.twig', [
            'error' => $error,
            'form' => $form->createView()
        ]);


    }

}