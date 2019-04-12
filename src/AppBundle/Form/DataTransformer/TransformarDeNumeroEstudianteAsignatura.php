<?php

namespace AppBundle\Form\DataTransformer;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use AppBundle\Entity\Aula;
use AppBundle\Entity\EstudianteAsignatura;

class TransformarDeNumeroEstudianteAsignatura implements DataTransformerInterface
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
        
        return $value->getIdEstudianteAsignatura();
    }

    public function reverseTransform($Number)
    {
        if (!$Number) {
            return;
        }
        
        $entity = $this->entityManager->getRepository(EstudianteAsignatura::class)->find($Number);
        if (null === $entity) {
            throw new TransformationFailedException(sprintf('Estudiante Asignatura con el numero "%s" no existe!',$Number));
        }
        
        return $entity;
    }
    
}