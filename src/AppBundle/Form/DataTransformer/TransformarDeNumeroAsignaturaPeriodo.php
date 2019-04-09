<?php

namespace AppBundle\Form\DataTransformer;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use AppBundle\Entity\AsignaturaPeriodo;

class TransformarDeNumeroAsignaturaPeriodo implements DataTransformerInterface
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
    
        return $value->getIdAsignaturaPeriodo();
    }

    public function reverseTransform($Number)
    {
        if (!$Number) {
            return;
        }
        
        $entity = $this->entityManager->getRepository(AsignaturaPeriodo::class)->find($Number);
        if (null === $entity) {
            throw new TransformationFailedException(sprintf('La Asignatura periodo con el numero "%s" no existe!',$Number));
        }
        
        return $entity;
    }
    
}