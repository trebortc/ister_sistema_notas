<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalificacionPlantilla
 *
 * @ORM\Table(name="calificacion_plantilla")
 * @ORM\Entity
 */
class CalificacionPlantilla
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_CALIFICACION_PLANTILLA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCalificacionPlantilla;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=64, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=1, nullable=true)
     */
    private $estado;



    /**
     * Get idCalificacionPlantilla
     *
     * @return integer
     */
    public function getIdCalificacionPlantilla()
    {
        return $this->idCalificacionPlantilla;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return CalificacionPlantilla
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return CalificacionPlantilla
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
