<?php

namespace AppBundle\Form\DataTransformer;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use AppBundle\Entity\Profesor;

class TransformarDeNumeroProfesor implements DataTransformerInterface
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
        
        return $value->getIdProfesor();
    }

    public function reverseTransform($Number)
    {
        if (!$Number) {
            return;
        }
        
        $entity = $this->entityManager->getRepository(Profesor::class)->find($Number);
        if (null === $entity) {
            throw new TransformationFailedException(sprintf('Un Profesor con el numero "%s" no existe!',$Number));
        }
        
        return $entity;
    }
    
}