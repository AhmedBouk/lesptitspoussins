<?php


namespace App\Controller;


use App\Entity\EnfantProfil;
use App\Entity\Parentt;
use App\Form\EnfantFormType;
use App\Services\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class EnfantController extends AbstractController
{

    /**
     * @Route("/parent/{id}/enfant/créer", name="créerenfant")
     */
    public function nouvelEnfant(Request $request, AuthenticationUtils $authenticationUtils, FileUploader $fileUploader, Parentt $parentt) : Response
    {

        $id = $parentt->getId();


        $enfant = new EnfantProfil();

        $error = $authenticationUtils->getLastAuthenticationError();


        $form = $this->createForm(EnfantFormType::class, $enfant);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()){


            /**
             *@var UploadedFile $actedenaissance
             */
            $actedenaissance = $form->get('acteDeNaissance')->getData();
            if (isset($actedenaissance)){
                $pathActeDeNaissance = "/fichiers/enfants/acte_de_naissance";
                $fileName = $fileUploader->upload($actedenaissance,$pathActeDeNaissance);
                $enfant->setActeDeNaissance($fileName);
            }

            /**
             *@var UploadedFile $certificatDeGrossesse
             */
            $certificatDeGrossesse = $form->get('certificatDeGrossesse')->getData();
            if (isset($certificatDeGrossesse)){
                $pathCertificatDeGrossesse = "/fichiers/enfants/certificat_de_grossesse";
                $fileName = $fileUploader->upload($certificatDeGrossesse,$pathCertificatDeGrossesse);

                $enfant->setCertificatDeGrossesse($fileName);
            }

            /**
             *@var UploadedFile $livretDeFamilleEnfant
             */
            $livretDeFamilleEnfant = $form->get('livretDeFamilleEnfant')->getData();
            if (isset($livretDeFamilleEnfant)){
                $pathLivretDeFamilleEnfant = "/fichiers/enfants/livret_de_famille";
                $fileName = $fileUploader->upload($livretDeFamilleEnfant,$pathLivretDeFamilleEnfant);

                $enfant->setLivretDeFamilleEnfant($fileName);
            }

            $enfant->setParentt($parentt);

            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();

            $this->addFlash('success', 'L\'Enfant a bien été enregistré');

            return $this->redirectToRoute('dashboardparent', [
                'id' => $id
            ]);
        }

        return $this->render('parent/profil_child.html.twig', [
            'error' => $error,
            'form' => $form->createView()
        ]);


    }

    /**
     * @Route("/parent/{id}/enfant/edit/{enfant_id}", name="editsenfant")
     * @ParamConverter("enfantProfil", options={"id" = "enfant_id"})
     */
    public function editEnfant(Request $request, EnfantProfil $enfantProfil, Parentt $parentt, FileUploader $fileUploader, AuthenticationUtils $authenticationUtils)
    {

        $id = $parentt->getId();

        $error = $authenticationUtils->getLastAuthenticationError();


        $form = $this->createForm(EnfantFormType::class, $enfantProfil);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {


            /**
             * @var UploadedFile $actedenaissance
             */
            $actedenaissance = $form->get('acteDeNaissance')->getData();
            if (isset($actedenaissance)) {
                $pathActeDeNaissance = "/fichiers/enfants/acte_de_naissance";
                $fileName = $fileUploader->upload($actedenaissance,$pathActeDeNaissance);
                $enfantProfil->setActeDeNaissance($fileName);
            }

            /**
             * @var UploadedFile $certificatDeGrossesse
             */
            $certificatDeGrossesse = $form->get('certificatDeGrossesse')->getData();
            if (isset($certificatDeGrossesse)) {
                $pathCertificatDeGrossesse = "/fichiers/enfants/certificat_de_grossesse";
                $fileName = $fileUploader->upload($certificatDeGrossesse,$pathCertificatDeGrossesse);
                $enfantProfil->setCertificatDeGrossesse($fileName);
            }

            /**
             * @var UploadedFile $livretDeFamilleEnfant
             */
            $livretDeFamilleEnfant = $form->get('livretDeFamilleEnfant')->getData();
            if (isset($livretDeFamilleEnfant)) {
                $pathLivretDeFamilleEnfant = "/fichiers/enfants/livret_de_famille";
                $fileName = $fileUploader->upload($livretDeFamilleEnfant,$pathLivretDeFamilleEnfant);
                $enfantProfil->setLivretDeFamilleEnfant($fileName);
            }

            $enfantProfil->setParentt($parentt);

            $em = $this->getDoctrine()->getManager();
            $em->persist($enfantProfil);
            $em->flush();

            $this->addFlash('success', 'L\'Enfant a bien été enregistré');

            return $this->redirectToRoute('dashboardparent', [
                'id' => $id
            ]);
        }

        return $this->render('parent/profil_child.html.twig', [
            'error' => $error,
            'form' => $form->createView()
        ]);
    }


}