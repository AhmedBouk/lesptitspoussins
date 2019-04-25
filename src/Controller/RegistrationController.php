<?php


namespace App\Controller;


use App\Entity\Parentt;
use App\Form\RegistrationForm;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function createParentt(Request $request, UserPasswordEncoderInterface $passwordEncoder, LoginFormAuthenticator $authenticator, GuardAuthenticatorHandler $guardAuthenticatorHandler) : Response
    {
        $parentt = new Parentt();
        $submittedToken = $request->request->get('token');

        $form = $this->createForm(RegistrationForm::class, $parentt)
        ;
        $form->handleRequest($request);

        if ($this->isCsrfTokenValid('create-parentt', $submittedToken)) {

            if ($form->isSubmitted() && $form->isValid()) {
                $parentt->setPassword(
                    $passwordEncoder->encodePassword(
                        $parentt,
                        $form->get('password')->getData()
                    )
                );

                $em = $this->getDoctrine()->getManager();
                $em->persist($parentt);
                $em->flush();

                return $guardAuthenticatorHandler->authenticateUserAndHandleSuccess(
                    $parentt,
                    $request,
                    $authenticator,
                    'parentt'
                );
            }
        }

        return $this->render('invit/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }

}