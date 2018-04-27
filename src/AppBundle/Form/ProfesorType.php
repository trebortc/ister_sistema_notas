<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Entity\Usuario;

class ProfesorType extends AbstractType
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
        ->add('titulo')
        ->add('celular')
        ->add('telefono')
        ->add('email')
        ->add('cargo')
        ->add('direccion')
        ->add('idNick')
         ->add('Guardar',SubmitType::class);
         //->add('idnick', EntityType::class, array('class' => Usuario::class,'choice_label' => 'nick',))
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
