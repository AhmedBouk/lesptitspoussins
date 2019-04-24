<?php

namespace App\Controller;

use App\Repository\ProProfilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DetailProController extends AbstractController
{
    /**
     * @Route("/detail_pro/{id}", name="detail_pro")
     */
    public function index(ProProfilRepository $proProfilRepository, $id)
    {
        $request = $proProfilRepository->findinfo($id);

        dump($request);

        return $this->render('parent/detail_pro.html.twig', [
            'controller_name' => 'DetailProController',
            'name' => $request[0]['nom_entreprise'],
            'mail' => $request[0]['mail'],
            'telephone' => $request[0]['telephone'],
            'dispo' => $request[0]['disponibilite'],
            'tarif' => $request[0]['tarif'],
            'horaire' => $request[0]['horaire']



        ]);
    }
}
