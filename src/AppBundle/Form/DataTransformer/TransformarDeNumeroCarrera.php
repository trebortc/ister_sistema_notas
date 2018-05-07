<?php

namespace AppBundle\Form\DataTransformer;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use AppBundle\Entity\Carrera;

class TransformarDeNumeroCarrera implements DataTransformerInterface
{
    
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function transform($value)
    {
        if (null === $value) {
            return '';
        }
        
        return $value->getIdCarrera();
    }

    public function reverseTransform($Number)
    {
        if (!$Number) {
            return;
        }
        
        $entity = $this->entityManager->getRepository(Carrera::class)->find($Number);
        if (null === $entity) {
            throw new TransformationFailedException(sprintf('An Carrera with number "%s" does not exist!',$Number));
        }
        
        return $entity;
    }
    
}