<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExceptionController extends AbstractController
{
    public function show403()
    {
        return $this->render('bundles/TwigBundle/Exception/error403.html.twig');
    }

}