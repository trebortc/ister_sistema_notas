<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Usuario;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Form\DataTransformer\UsuarioSelectorType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ProfesorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idProfesor', null, array('required' => false,))
        ->add('identificacion')
        ->add('tipoIdentificacion', ChoiceType::class, array(
            'choices' => array(
                'Cedula' => 'C', 
                'Pasaporte' => 'P', 
                'Visa' => 'V')
        ))
        ->add('nombres')
        ->add('fechaNacimiento', DateType::class, array( 'widget' => 'single_text', 'html5' => false,))
        ->add('titulo')
        ->add('celular')
        ->add('telefono')
        ->add('email', EmailType::class)
        ->add('cargo')
        ->add('direccion', TextareaType::class)
        ->add('idnick', UsuarioSelectorType::class, array('required'=>false,));

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Profesor'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_profesor';
    }


}
