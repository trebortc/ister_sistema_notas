<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PeriodoAcademicoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idPeriodoAcademico', null, array('required' => false))
        ->add('fechaInicio', DateType::class, array( 'widget' => 'single_text', 'html5' => false,))
        ->add('fechaFin', DateType::class, array( 'widget' => 'single_text', 'html5' => false,))
        ->add('estado', ChoiceType::class, array(
            'choices' => array(
                'Activo' => 'A',
                'Inactivo' => 'I',
                'Eliminado' => 'E',
                'Anulado' => 'N',
            ),
        ))
        ->add('idParcialPlantilla');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PeriodoAcademico'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_periodoacademico';
    }


}
