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
        return $this->render('invit/index.html.twig' );

    }
    /**
     * @Route("/become", name="becom")
     */
    public function become()
    {
        return $this->render('invit/become_pro.html.twig' );

    }
    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        return $this->render('invit/inscription.html.twig' );

    }
    /**
     * @Route("/sub", name="sub")
     */
    public function sub()
    {
        return $this->render('invit/subs.html.twig' );

    }
    /**
     * @Route("/dash", name="dash")
     */
    public function dash()
    {
        return $this->render('parent/dashboard.html.twig' );

    }
    /**
     * @Route("/detail", name="detail")
     */
    public function detail()
    {
        return $this->render('parent/detail_pro.html.twig' );

    }
    /**
     * @Route("/child", name="child")
     */
    public function child()
    {
        return $this->render('parent/profil_child.html.twig' );

    }
    /**
 * @Route("/par", name="par")
 */
    public function par()
    {
        return $this->render('parent/profil_parent.html.twig' );

    }
    /**
     * @Route("/review", name="review")
     */
    public function review()
    {
        return $this->render('parent/review.html.twig' );

    }
    /**
     * @Route("/pro", name="pro")
     */
    public function pro()
    {
        return $this->render('pro/pro_dashboard.html.twig' );

    }
    /**
     * @Route("/occup", name="occup")
     */
    public function occup()
    {
        return $this->render('pro/pro_occupant.html.twig' );

    }
    /**
     * @Route("/profilpro", name="profilpro")
     */
    public function profilpro()
    {
        return $this->render('pro/pro_profil.html.twig' );

    }
    /**
     * @Route("/request", name="request")
     */
    public function request()
    {
        return $this->render('pro/pro_request.html.twig' );

    }
    /**
     * @Route("/proreview", name="proreview")
     */
    public function proreview()
    {
        return $this->render('pro/pro_review.html.twig' );

    }
}

