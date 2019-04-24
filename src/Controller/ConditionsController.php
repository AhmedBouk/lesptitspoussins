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
        return $this->render('invit/conditiongit add .html.twig');
    }
}
