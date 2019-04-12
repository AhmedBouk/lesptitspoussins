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
//        echo '<pre>';
//        var_dump($_SESSION);
//        echo '</pre>';
        return $this->render('invit/index.html.twig');

    }
}

