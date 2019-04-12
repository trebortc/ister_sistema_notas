<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\DataTransformer\ActividadInformativaSelectorType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ActividadInformativaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idActividadInformativa', null, array(
            'required'   => false,
        ))
        ->add('titulo')
        ->add('descripcion', TextareaType::class)
        ->add('imagen', FileType::class)
        ->add('archivoAdjunto',FileType::class)
        ->add('link')
        ->add('fechaPublicacion', DateType::class, ['widget' => 'choice', ])
        ->add('idAsignaturaPeriodo', AsignaturaPeriodoType::class, array('required'=>false,));       
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ActividadInformativa'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_actividadinformativa';
    }


}
