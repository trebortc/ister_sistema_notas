<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EstudianteRepository extends EntityRepository
{
    public function findAllEstudiantes()
    {
        return $this->getEntityManager()
        ->createQuery(
            'SELECT e FROM AppBundle:Estudiante e ORDER BY e.nombres ASC'
        )
        ->getResult();
    }
    
}
