<?php
namespace App\Controller;
use App\Entity\ProProfil;
use App\Repository\ProProfilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class MapController extends AbstractController
{
    /**
     * @Route("/map/{cp}", name="map")
     */
    public function index(ProProfilRepository $proProfilRepository, string  $cp)
    {
        $request = $proProfilRepository->findcoord($cp);

        if (isset($request[0]))
        {

            $data = array();
            foreach ($request as $row)
            {
                $data[] = [
                    'lat' => $row['latitude'],
                    'long' => $row['longitude'],
                    'infra' => $row['nom_entreprise']
                ];
            }

            dump($data);



            $adress = array(
                'postalcode'=>  $cp,
                'country'   =>  'France',
                'format'    =>  'json'
            );

// Création d'une nouvelle ressource cURL
            $ch = curl_init("https://nominatim.openstreetmap.org/?". http_build_query($adress));
// Configuration de l'URL et d'autres options
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mettre ici un user-agent adéquat');
// Récupération de l'URL et affichage sur le navigateur
            $g = curl_exec($ch);
// Fermeture de la session cURL
            curl_close($ch);
            $center = json_decode($g,true);


dump($center);

            return $this->render('parent/search.html.twig', [
                'controller_name' => 'MapController',
                'data' => $data,
                'lat' => $center[0]['lat'],
                'lon' => $center[0]['lon'],
            ]);



        }else{
            return $this->render('parent/search.html.twig', [
                'controller_name' => 'MapController'
            ]);
        }

    }
}