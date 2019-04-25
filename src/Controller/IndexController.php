<?php

namespace App\Controller;

use App\Admin\ParenttAdmin;
use App\Entity\Parentt;
use App\Form\RegistrationForm;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;


class IndexController extends AbstractController
{
    /**
     * @Route("/", name="indexsite")
     */
    public function index()
    {
        return $this->render('invit/index.html.twig');
    }


    /**
     * @Route("/inscription")
     */
    public function createParentt(Request $request, UserPasswordEncoderInterface $passwordEncoder, LoginFormAuthenticator $authenticator, GuardAuthenticatorHandler $guardAuthenticatorHandler, \Swift_Mailer $mailer) : Response
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

                $message = (new \Swift_Message('Confirmation d\'inscription'))
                    ->setContentType('text/html', 'utf8')
                    ->setFrom('lesptitspoussinss@gmail.com')
                    ->setTo($form->get('mail')->getData())
                    ->setBody('<h4>Confirmation de votre Inscription</h4><p>Bravo, vous voici inscrits sur le site lesptitspoussins! Vous êtes enregistré en tant que parent, maintenant vous pouvez découvrir
                        notre site à cette adresse :</p>'.utf8_decode('<a href="127.0.0.1:8000/index">Lesptitspoussins</a>'))
                ;

                $mailer->send($message);
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
    /**
     * @Route("/becomepro", name="becomepro")
     */
    public function becomepro()
    {
        return $this->render('invit/become_pro.html.twig');
    }
}

