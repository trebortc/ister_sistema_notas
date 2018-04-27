<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Usuario;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Carrera;

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
        ->add('fechaNacimiento')
        ->add('celular')
        ->add('telefono')
        ->add('email')
        ->add('direccion')
        ->add('idnick')
        ->add('idcarrera');
        
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
