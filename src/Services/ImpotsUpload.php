<?php


namespace App\Services;


use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImpotsUpload
{
    /**
     * @var string
     */
    private $impotsDirectory;

    public function __construct($impotsDirectory)
    {
        $this->impotsDirectory = $impotsDirectory;
    }

    public function upload(UploadedFile $file)
    {
        //On nomme notre fichier pour la bdd
        $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

        //On effectue le déplacement du fichier
        try{
            $file->move(
                $this->getImpotsDirectory(),
                $fileName
            );
        } catch (FileException $exception){

        }

        return $fileName;

    }

    /**
     * @return string
     */
    public function getImpotsDirectory(): string
    {
        return $this->impotsDirectory;
    }

    public function generateUniqueFileName()
    {
        return md5(uniqid());
    }

}