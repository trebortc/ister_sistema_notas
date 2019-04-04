<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\DataTransformer\CarreraSelectorType;
use AppBundle\Form\DataTransformer\UsuarioSelectorType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class EstudianteType extends AbstractType
{
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idEstudiante', null, array(
            'required'   => false,
        ))
        ->add('identificacion')
        ->add('tipoIdentificacion', ChoiceType::class, array(
            'choices' => array(
                'Cedula' => 'C',
                'Pasaporte' => 'P',
            ),
        ))
        ->add('nombres')
        ->add('fechaNacimiento', DateType::class, array( 'widget' => 'single_text', 'html5' => false,))
        ->add('celular')
        ->add('telefono')
        ->add('email', EmailType::class)
        ->add('direccion')
        ->add('idnick',UsuarioSelectorType::class, array('required'=>false,))
        ->add('idcarrera',CarreraSelectorType::class, array('required'=>false,));

        
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Estudiante'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_estudiante';
    }

}
