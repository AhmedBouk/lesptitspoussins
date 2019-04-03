<?php


namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AvisAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('note', ChoiceType::class, [
                'multiple' => true,
                'choices' => [
                    'j\'aime' => 'j\'aime',
                    'je n\'aime pas' => 'je n\'aime pas'
                ]
            ])
            ->add('texte')
            ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->add('note', ChoiceType::class, [
                'multiple' => true,
                'choices' => [
                    'j\'aime' => 'j\'aime',
                    'je n\'aime pas' => 'je n\'aime pas'
                ]
            ])
            ->add('text')
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('id')
            ;
    }

}