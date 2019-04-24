<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExceptionController extends AbstractController
{

    /**
     * @Route("/error403", name="403")
     */
    public function show403()
    {
        return $this->render('bundles/TwigBundle/Exception/error403.html.twig');
    }

}