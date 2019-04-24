<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SubsController extends AbstractController
{
    /**
     * @Route("/subs", name="subs")
     */
    public function index()
    {
        return $this->render('invit/subs.html.twig');
    }
}
