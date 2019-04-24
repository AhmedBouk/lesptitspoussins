<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BraceletController extends AbstractController
{
    /**
     * @Route("/bracelet", name="bracelet")
     */
    public function index()
    {
        return $this->render('invit/bracelet.html.twig');
    }
}