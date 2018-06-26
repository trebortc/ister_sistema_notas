<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AsignaturaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('idAsignatura', null, array(
            'required'   => false,
        ))
        ->add('nombre')
        ->add('descripcion', TextareaType::class)
        ->add('nivel', ChoiceType::class, array(
            'choices' => array(
                'Primer Semestre' => 1,
                'Segundo Semestre' => 2,
                'Tercer Semestre' => 3,
                'Cuarto Semestre' => 4,
                'Quinto Semestre' => 5,
                'Sexto Semestre' => 6,
                
            ),
        ))
        ->add('creditos', ChoiceType::class, array(
            'choices' => array(
                'Dos creditos' => 2,
                'Tres creditos' => 3,
                'Cuatro creditos' => 4,
                'Cinco creditos' => 5,
                'Seis creditos' => 6,
                'Siete creditos' => 7,
                'Ocho creditos' => 8,
                'Nueve creditos' => 9,
                'Diez creditos' => 10,
            ),
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Asignatura'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_asignatura';
    }


}
