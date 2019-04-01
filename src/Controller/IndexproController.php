<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexproController extends AbstractController
{
    /**
     * @Route("/indexpro", name="indexpro")
     */
    public function index()
    {
        return $this->render('pro/pro_review.html.twig');
    }
}
