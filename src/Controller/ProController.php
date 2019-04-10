<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProController extends AbstractController
{

    /**
     * @Route("/pro/dashboard/{id}", name="prodashboard")
     */
    public function dashboard()
    {
        return $this->render('pro/pro_dashboard.html.twig');
    }

    public function editprofil($id)
    {

    }

}