<?php


namespace App\Controller;


use App\Entity\Parentt;
use App\Form\ParenttFormType;
use App\Repository\ParenttRepository;
use App\Services\FileUploader;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ParenttController extends AbstractController
{

    /**
     * @Route("/parent/{id}/dashboard", name="dashboardparent")
     */
    public function dashboardparentt(ParenttRepository $parenttRepository, $id, Parentt $parentt)
    {
        $enfants = $parenttRepository->findByEnfant($id);

        $data = array();
        foreach ($enfants as $row){

            $data[] = array(
                'prenom' => $row['prenom'],
                'nom' => $row['nom']
            );
        }
        return $this->render('parent/dashboard.html.twig', [
            'parent' => $parentt,
            'data' => $data,
        ]);
    }

    /**
     * @Route("/parent/profil/{id}/edit", name="editparent")
     */
    public function editparentt(Request $request, Parentt $parentt, FileUploader $fileUploader)
    {
        $form = $this->createForm(ParenttFormType::class, $parentt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //On définit notre variable revenu qui récupère le fichier mis dans le formulaire
            /** @var UploadedFile $revenus */
            $revenus = $form->get('revenu')->getData();

            $revenusName = $fileUploader->uploaed($revenus);

            $parentt->setRevenu($revenusName);


            $em = $this->getDoctrine()->getManager();
            $em->persist($parentt);
            $em->flush();


            return $this->redirectToRoute('dashboardparent', [
                'id' => $parentt->getId(),
            ]);
        }

        return $this->render('parent/profil_parent.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    private function generateUniqueFileName()
    {
        md5(uniqid());
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }

}