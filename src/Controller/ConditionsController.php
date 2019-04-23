<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConditionsController extends AbstractController
{
    /**
     * @Route("/conditions", name="conditions")
     */
    public function index()
    {
        return $this->render('invit/condition.html.twig', [
            'controller_name' => 'ConditionsController',
        ]);
    }
}
