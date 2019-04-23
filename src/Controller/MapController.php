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



        return $this->render('parent/search.html.twig', [
            'controller_name' => 'MapController',
            'lat' => $request['latitude'],
            'lon' => $request['longitude']

        ]);
    }
    /**
     * @Route("/map2", name="map2")
     */
    //public function index2(ProProfilRepository $proProfilRepositoryvalue)
    public function index2(ProProfilRepository $proProfilRepositoryvalue)
    {
        $test = $proProfilRepositoryvalue->findOneBySomeField(1);
        $adress = array(
            'street'    => '24 place st marc',
            'city'      => 'Rouen',
            'postalcode'=>  '76000',
            'country'   =>  'France',
            'format'    =>  'json'
        );
        //$infra = $info_infra->getnomEntreprise();
        $infra = "Nom de l'infrastructure";
        $description = "C'est ici qu'il faut mettre la description !";
// Création d'une nouvelle ressource cURL
        $ch = curl_init("https://nominatim.openstreetmap.org/?". http_build_query($adress));
// Configuration de l'URL et d'autres options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mettre ici un user-agent adéquat');
// Récupération de l'URL et affichage sur le navigateur
        $g = curl_exec($ch);
// Fermeture de la session cURL
        curl_close($ch);
        $json_data = json_decode($g,true);
        return $this->render('parent/search.html.twig', [
            'controller_name' => 'MapController',
            'lat' => $json_data[0]['lat'],
            'lon' => $json_data[0]['lon'],
            'infra' => $infra,
            'description' => $description,
            'pro' => $test,
        ]);
    }
    /**
     * @Route("/map3", name="map3")
     */
    public function withInseeAPI()
    {
        $adress = array(
            'street'    => '24 place st marc',
            'city'      => 'Rouen',
            'postalcode'=>  '76000',
            'country'   =>  'France',
            'format'    =>  'json'
        );
        $infra = "Nom de l'infrastructure";
        $description = "C'est ici qu'il faut mettre la description !";
        //$token = OAuth::getAccessToken("3987ccff-9272-3f91-ba3e-d25f919798e3");
        // Création d'une nouvelle ressource cURL
        $ch = curl_init("https://nominatim.openstreetmap.org/?". http_build_query($adress));
// Configuration de l'URL et d'autres options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mettre ici un user-agent adéquat');
// Récupération de l'URL et affichage sur le navigateur
        $g = curl_exec($ch);
// Fermeture de la session cURL
        curl_close($ch);
        $json_data = json_decode($g,true);
        return $this->render('parent/search.html.twig', [
            'controller_name' => 'MapController',
            'lat' => $json_data[0]['lat'],
            'lon' => $json_data[0]['lon'],
            'infra' => $infra,
            'description' => $description,
            //'token' => $token
        ]);
    }
}