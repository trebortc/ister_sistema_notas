<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ParcialPlantillaDetalleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('porcentaje')
        ->add('idParcialPlantilla', EntityType::class, 
            array('placeholder' => 'Seleccione una opcion',
            'class' => 'AppBundle:ParcialPlantilla',
            'choice_label' => 'nombre', 
            ));
        
        /*->add('categories', EntityType::class, array(
            'class' => 'AppBundle:Category',
            'choice_label' => 'name',
            'multiple' => TRUE
        ))*/
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ParcialPlantillaDetalle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_parcialplantilladetalle';
    }


}
