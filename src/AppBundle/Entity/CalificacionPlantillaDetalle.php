<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalificacionPlantillaDetalle
 *
 * @ORM\Table(name="calificacion_plantilla_detalle", indexes={@ORM\Index(name="FK_RELATIONSHIP_11", columns={"ID_CALIFICACION_PLANTILLA"})})
 * @ORM\Entity
 */
class CalificacionPlantillaDetalle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_CALIFICACION_PLANTILLA_DETALLE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCalificacionPlantillaDetalle;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=64, nullable=true)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="PORCENTAJE", type="integer", nullable=true)
     */
    private $porcentaje;

    /**
     * @var \CalificacionPlantilla
     *
     * @ORM\ManyToOne(targetEntity="CalificacionPlantilla")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CALIFICACION_PLANTILLA", referencedColumnName="ID_CALIFICACION_PLANTILLA")
     * })
     */
    private $idCalificacionPlantilla;



    /**
     * Get idCalificacionPlantillaDetalle
     *
     * @return integer
     */
    public function getIdCalificacionPlantillaDetalle()
    {
        return $this->idCalificacionPlantillaDetalle;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return CalificacionPlantillaDetalle
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
     * Set porcentaje
     *
     * @param integer $porcentaje
     *
     * @return CalificacionPlantillaDetalle
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return integer
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set idCalificacionPlantilla
     *
     * @param \AppBundle\Entity\CalificacionPlantilla $idCalificacionPlantilla
     *
     * @return CalificacionPlantillaDetalle
     */
    public function setIdCalificacionPlantilla(\AppBundle\Entity\CalificacionPlantilla $idCalificacionPlantilla = null)
    {
        $this->idCalificacionPlantilla = $idCalificacionPlantilla;

        return $this;
    }

    /**
     * Get idCalificacionPlantilla
     *
     * @return \AppBundle\Entity\CalificacionPlantilla
     */
    public function getIdCalificacionPlantilla()
    {
        return $this->idCalificacionPlantilla;
    }
}
