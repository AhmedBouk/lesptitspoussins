<?php


namespace App\Services;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader extends AbstractController
{

    private $targetDirectory;


    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file, $test)
    {



            //On nomme notre fichier pour la bdd
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

            //On effectue le déplacement du fichier
            try {
                $file->move(
                    $this->getTargetDirectory().$test,
                    $fileName
                );
            } catch (FileException $exception) {

            }

            return $fileName;


    }

    /**
     * @return mixed
     */
    public function getTargetDirectory()

    {
        return $this->targetDirectory;
    }

    public function generateUniqueFileName()
    {
        return md5(uniqid());
    }

}