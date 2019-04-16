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
                'label' => 'Veuillez mettre vos trois derniers revenus',
                'multiple' => true
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
