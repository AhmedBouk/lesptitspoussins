<?php

namespace App\Form;

use App\Entity\Parentt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParenttFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('mail', EmailType::class)
            ->add('ville')
            ->add('codepostal')
            ->add('adresse')
            ->add('telephone')
            ->add('revenu', FileType::class, [
                'required' => false,
                'data_class' => null
            ])
            ->add('attestationcaf', FileType::class, [
                'required' => false,
                'data_class' => null
            ])
            ->add('impots', FileType::class, [
                'required' => false,
                'data_class' => null
            ])
            ->add('livretdefamille', FileType::class, [
                'required' => false,
                'data_class' => null
            ])
            ->add('justificatifdomicile', FileType::class, [
                'required' => false,
                'data_class' => null
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Parentt::class,
        ]);
    }
}
