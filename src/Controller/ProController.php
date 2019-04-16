<?php


namespace App\Controller;


use App\Entity\ProProfil;
use App\Form\ProProfilFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ProController extends AbstractController
{

    /**
     * @Route("/pro/dashboard/{id}", name="prodashboard")
     */
    public function dashboard(ProProfil $proProfil)
    {
        return $this->render('pro/pro_dashboard.html.twig', [
            'pro' => $proProfil
        ]);
    }

    /**
     * @Route("/pro/profil/{id}/edit", name="editproprofil")
     */
    public function editprofil(Request $request, ProProfil $proProfil)
    {
        $form = $this->createForm(ProProfilFormType::class, $proProfil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            //On créer notre variable file pour utiliser les propriétes
            /** @var UploadedFile $file */
            $file = $proProfil->getAvatar();

            //On créer notre chaîne de caractère pour notre image upload
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            //On effectue le déplacement si c'est bon
            try{
                $file->move(
                    $this->getParameter('avatar_directory'),
                    $fileName
                );
            } catch (FileException $exception){

            }
            //On enregistre la chaîne de caractère dans notre bdd avec l'entité
            $proProfil->setAvatar($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($proProfil);
            $em->flush();

            return $this->redirectToRoute('prodashboard', [
                'id' => $proProfil->getId()
            ]);
        }

        return $this->render('pro/pro_profil.html.twig', [
            'form' => $form->createView()
        ]);

    }

    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }

}