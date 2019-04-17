<?php


namespace App\Controller;


use App\Entity\EnfantProfil;
use App\Entity\Parentt;
use App\Form\EnfantFormType;
use App\Services\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class EnfantController extends AbstractController
{

    /**
     * @Route("/parent/enfant/créer", name="créerenfant")
     */
    public function nouvelEnfant(Request $request, AuthenticationUtils $authenticationUtils, FileUploader $fileUploader) : Response
    {
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
                $fileName = $fileUploader->upload($actedenaissance);
                $actedenaissance->setActeDeNaissance($fileName);
            }
            /**
             *@var UploadedFile $certificatDeGrossesse
             */
            $certificatDeGrossesse = $form->get('certificatDeGrossesse')->getData();
            if (isset($certificatDeGrossesse)){
                $fileName = $fileUploader->upload($certificatDeGrossesse);
                $certificatDeGrossesse->setCertificatDeGrossesse($fileName);
            }
            /**
             *@var UploadedFile $livretDeFamilleEnfant
             */
            $livretDeFamilleEnfant = $form->get('livretDeFamilleEnfant')->getData();
            if (isset($livretDeFamilleEnfant)){
                $fileName = $fileUploader->upload($livretDeFamilleEnfant);
                $livretDeFamilleEnfant->setLivretDeFamilleEnfant($fileName);
            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();

            $this->addFlash('success', 'L\'Enfant a bien été enregistré');






            return $this->redirectToRoute('dashboardparent', [
                'id' => $request->getSession('id')
            ]);
        }

        return $this->render('parent/profil_child.html.twig', [
            'error' => $error,
            'form' => $form->createView()
        ]);


    }

}