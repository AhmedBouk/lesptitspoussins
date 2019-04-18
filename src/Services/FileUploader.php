<?php


namespace App\Services;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader extends AbstractController
{

    public function __construct()
    {
    }

    public function upload(UploadedFile $file)
    {

        //On nomme notre fichier pour la bdd
        $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

        //On effectue le déplacement du fichier
        try {
            $file->move(
                $this->getParameter('fichiersmedicaux_directory'),
                $fileName
            );
        } catch (FileException $exception) {

        }

        return $fileName;

    }

    public function generateUniqueFileName()
    {
        return md5(uniqid());
    }

}