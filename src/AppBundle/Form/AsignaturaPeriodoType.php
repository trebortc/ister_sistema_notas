<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use AppBundle\Form\DataTransformer\PeriodoAcademicoSelectorType;
use AppBundle\Form\DataTransformer\ProfesorSelectorType;
use AppBundle\Form\DataTransformer\AsignaturaSelectorType;
use AppBundle\Form\DataTransformer\AulaSelectorType;

class AsignaturaPeriodoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idAsignaturaPeriodo', null, array('required'=>false))
        ->add('estado', ChoiceType::class, 
            array('choices'=>
                array( 
                    'Activo' => 'A',
                    'Inactivo' => 'I',
                    'Eliminado' => 'E',
                    'Anulado' => 'N',
                    )
                )
            )
        ->add('creditos', IntegerType::class)
        ->add('horaInicio', TimeType::class, 
            array(
                'input'  => 'datetime', 
                'widget' => 'choice',
                )
            )
        ->add('horaFin', TimeType::class,
            array(
                'input'  => 'datetime',
                'widget' => 'choice',
                )
            )
        ->add('capacidad', IntegerType::class)
        ->add('idPeriodoAcademico', PeriodoAcademicoSelectorType::class, array('required'=>false,))
        ->add('idProfesor', ProfesorSelectorType::class, array('required'=>false,))
        ->add('idAsignatura', AsignaturaSelectorType::class, array('required'=>false,))
        ->add('idAula', AulaSelectorType::class, array('required'=>false,));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AsignaturaPeriodo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_asignaturaperiodo';
    }


}
