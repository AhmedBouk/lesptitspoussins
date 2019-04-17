<?php


namespace App\Services;


use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    /**
     * @var string
     */
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file)
    {
        //On nomme notre fichier pour la bdd
        $fileName = md5(uniqid().'.'.$file->guessExtension());

        //On effectue le déplacement du fichier
        try{
            $file->move(
                $this->getTargertDirectory(),
                    $fileName
            );
        } catch (FileException $exception){

        }

        return $fileName;

    }

    /**
     * @return mixed
     */
    public function getTargertDirectory()
    {
        return $this->targetDirectory;
    }

}