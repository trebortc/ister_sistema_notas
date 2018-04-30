<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Carrera;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\Usuario;
use AppBundle\Form\DataTransformer\CarreraSelectorType;
use AppBundle\Form\DataTransformer\UsuarioSelectorType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EstudianteType extends AbstractType
{
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('identificacion')
        ->add('tipoIdentificacion')
        ->add('nombres')
        ->add('fechaNacimiento', DateType::class, array( 'widget' => 'single_text', 'html5' => false,))
        ->add('celular')
        ->add('telefono')
        ->add('email')
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
