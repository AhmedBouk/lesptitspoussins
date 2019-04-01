<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('parent/dashboard.html.twig' );
    }
    /**
     * @Route("/profilpro", name="profilpro")
     */
    public function profilpro()
    {
        return $this->render('parent/detail_pro.html.twig' );
    }
    /**
     * @Route("/profilparent", name="profilparent")
     */
    public function profilparent()
    {
        return $this->render('parent/profil_parent.html.twig' );
    }
}
