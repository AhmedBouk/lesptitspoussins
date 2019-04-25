<?php

namespace App\Form;

use App\Entity\ProProfil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_entreprise')
            ->add('mail')
            ->add('ville')
            ->add('codepostal')
            ->add('adresse')
            ->add('telephone')
            ->add('password')
            ->add('token')
            ->add('created_at')
            ->add('updated_at')
            ->add('nombre_personnel')
            ->add('disponibilite')
            ->add('tarif')
            ->add('horaire')
            ->add('statut')
            ->add('nombredeplace')
            ->add('roles')
            ->add('longitude')
            ->add('latitude')
            ->add('avatar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProProfil::class,
        ]);
    }
}
