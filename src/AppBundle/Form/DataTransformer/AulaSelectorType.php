<?php

namespace AppBundle\Form\DataTransformer;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AulaSelectorType extends AbstractType
{
    private $transformer;
    
    public function __construct(TransformarDeNumeroAula $transformer)
    {
        $this->transformer = $transformer;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer($this->transformer);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'invalid_message' => 'The selected Aula does not exist',
        ));
    }
    
    public function getParent()
    {
        return TextType::class;
    }
}