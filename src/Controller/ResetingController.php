<?php

namespace App\Controller;

use App\Entity\Parentt;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ResetingController extends AbstractController
{
    public function request(Request $request, \Swift_Mailer $mailer, TokenGeneratorInterface $tokenGenerator)
    {

        $form = $this->createFormBuilder()
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Email(),
                    new NotBlank()
                ]
            ])
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $parentt = $em->getRepository(Parentt::class)->findBy($form->getData('email'));

            //Si l'email n'existe pas:
            if (!$parentt){
                $request->getSession()
            }
        }

    }
}
