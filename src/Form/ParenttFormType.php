<?php

namespace App\Form;

use App\Entity\Parentt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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
            ->add('password', PasswordType::class)
            ->add('confirmpassword', PasswordType::class)
            ->add('token')
            ->add('created_at')
            ->add('updated_at')
            ->add('created_at_abonnement')
            ->add('statut_abonnement')
            ->add('date_duree')
            ->add('is_enabled')
            ->add('statutcondition')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Parentt::class,
        ]);
    }
}
