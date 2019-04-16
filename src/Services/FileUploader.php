<?php


namespace App\Services;


use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targerDirectory;

    public function __construct($targerDirectory)
    {
        $this->targerDirectory = $targerDirectory;
    }

    public function uploaed(UploadedFile $file)
    {
        //On nomme notre fichier pour la bdd
        $fileName = md5(uniqid().'.'.$file->guessExtension());

        //On effectue le déplacement du fichier
        try{
            $file->move(
                $this->getTargerDirectory(),
                    $fileName
            );
        } catch (FileException $exception){

        }

        return $fileName;

    }

    /**
     * @return mixed
     */
    public function getTargerDirectory()
    {
        return $this->targerDirectory;
    }

}