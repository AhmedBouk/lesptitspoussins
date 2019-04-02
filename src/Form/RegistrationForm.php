<?php


namespace App\Form;


use App\Entity\Parentt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class RegistrationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mail', EmailType::class)
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Confirmer votre Mot de Passe')
            ])
            ->add('Conditionsdutilisations', CheckboxType::class, [
                'label' => 'Conditions d\'utilisations',
                'mapped' => false,
                'constraints' => new IsTrue()
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults( array(
            'data_class' => Parentt::class,
            'csrf_protection' => true,
            'csrf_field_name' => 'token',
            'csrf_token_id' => 'parentt_token',
        ));
    }

}