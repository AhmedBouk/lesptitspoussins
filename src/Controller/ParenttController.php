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

            //Upload de fichier pour le revenu
            //On définit notre variable revenu qui récupère le fichier mis dans le formulaire
            /** @var UploadedFile $revenus */
            $revenus = $form->get('revenu')->getData();
            if (isset($revenus)){
                $revenusName = $fileUploader->upload($revenus);
                $parentt->setRevenu($revenusName);
            }

            //Upload de la déclaration de la caf
            /** @var UploadedFile $caf */
            $caf = $form->get('attestationcaf')->getData();
            if (isset($caf)){
                $cafName = $fileUploader->upload($caf);
                $parentt->setAttestationcaf($cafName);
            }

            //Upload du livret de famille
            /** @var UploadedFile $livret */
            $livret = $form->get('livretdefamille')->getData();
            if (isset($livret)){
                $livretName = $fileUploader->upload($livret);
                $parentt->setLivretdefamille($livretName);
            }

            //Upload du justificatif de domicile
            /** @var UploadedFile $domicile */
            $domicile = $form->get('justificatifdomicile')->getData();
            if (isset($domicile)){
                $domicileName = $fileUploader->upload($domicile);
                $parentt->setJustificatifdomicile($domicileName);
            }

            //Upload de la déclaration d'impôts
            /** @var UploadedFile $impots */
            $impots = $form->get('impots')->getData();
            if (isset($impots)){
                $impotsName = $fileUploader->upload($impots);
                $parentt->setImpots($impotsName);
            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($parentt);
            $em->flush();

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