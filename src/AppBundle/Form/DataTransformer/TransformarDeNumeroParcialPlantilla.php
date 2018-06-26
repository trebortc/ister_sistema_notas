<?php

namespace AppBundle\Form\DataTransformer;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use AppBundle\Entity\Asignatura;
use AppBundle\Entity\ParcialPlantilla;

class TransformarDeNumeroParcialPlantilla implements DataTransformerInterface
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
        
        return $value->getIdParcialPlantilla();
    }

    public function reverseTransform($Number)
    {
        if (!$Number) {
            return;
        }
        
        $entity = $this->entityManager->getRepository(ParcialPlantilla::class)->find($Number);
        if (null === $entity) {
            throw new TransformationFailedException(sprintf('Una Parcial Plantilla con el numero "%s" no existe!',$Number));
        }
        
        return $entity;
    }
    
}