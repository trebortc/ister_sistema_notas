<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\DataTransformer\EstudianteSelectorType;
use AppBundle\Form\DataTransformer\AsignaturaPeriodoSelectorType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EstudianteAsignaturaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idEstudianteAsignatura', null, array('required'=>false))
        ->add('parcial1', NumberType::class)
        ->add('parcial2', NumberType::class)
        ->add('parcial3', NumberType::class)
        ->add('notaFinal', NumberType::class)
        ->add('estado', ChoiceType::class, 
            array('choices'=>array(
                'Activo'=>'A',
                'Inactivo'=>'I',
                'Eliminado'=>'E',
                'Anulado'=>'N'
                ) 
            )
        )
        ->add('idEstudiante', EstudianteSelectorType::class, array('required'=>false,))
        ->add('idAsignaturaPeriodo', AsignaturaPeriodoSelectorType::class, array('required'=>false,));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EstudianteAsignatura'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_estudianteasignatura';
    }


}
