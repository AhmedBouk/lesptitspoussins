<?php


namespace App\EventListener;


use App\Entity\Parentt;
use App\Services\FileUploader;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ParentsUploadListener
{

    private $uploader;

    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    private function uploadFile($entity)
    {
        //On définit que c'est uniquement pour les parents
        if (!$entity instanceof Parentt){
            return;
        }

        $file = $entity->getRevenu();

        //Seulement upload le nouveau fichier
        if ($file instanceof UploadedFile){
            $fileName = $this->uploader->upload($file);
            $entity->setRevenu($fileName);
        }elseif ($file instanceof File){
            $entity->setRevenu($file->getFilename());
        }
    }

}