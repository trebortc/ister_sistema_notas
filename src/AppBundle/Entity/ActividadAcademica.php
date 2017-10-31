<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActividadAcademica
 *
 * @ORM\Table(name="actividad_academica", indexes={@ORM\Index(name="FK_RELATIONSHIP_27", columns={"ID_ASIGNATURA_PERIODO"})})
 * @ORM\Entity
 */
class ActividadAcademica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ACTIVIDAD_ACADEMICA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActividadAcademica;

    /**
     * @var string
     *
     * @ORM\Column(name="NOTA", type="decimal", precision=2, scale=2, nullable=true)
     */
    private $nota;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=1024, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="REF_CALIFICACION_PLANTILLA", type="string", length=256, nullable=true)
     */
    private $refCalificacionPlantilla;

    /**
     * @var string
     *
     * @ORM\Column(name="REF_PARCIAL_PLANTILLA", type="string", length=256, nullable=true)
     */
    private $refParcialPlantilla;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_PRESENTACION", type="date", nullable=true)
     */
    private $fechaPresentacion;

    /**
     * @var \AsignaturaPeriodo
     *
     * @ORM\ManyToOne(targetEntity="AsignaturaPeriodo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ASIGNATURA_PERIODO", referencedColumnName="ID_ASIGNATURA_PERIODO")
     * })
     */
    private $idAsignaturaPeriodo;



    /**
     * Get idActividadAcademica
     *
     * @return integer
     */
    public function getIdActividadAcademica()
    {
        return $this->idActividadAcademica;
    }

    /**
     * Set nota
     *
     * @param string $nota
     *
     * @return ActividadAcademica
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return ActividadAcademica
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set refCalificacionPlantilla
     *
     * @param string $refCalificacionPlantilla
     *
     * @return ActividadAcademica
     */
    public function setRefCalificacionPlantilla($refCalificacionPlantilla)
    {
        $this->refCalificacionPlantilla = $refCalificacionPlantilla;

        return $this;
    }

    /**
     * Get refCalificacionPlantilla
     *
     * @return string
     */
    public function getRefCalificacionPlantilla()
    {
        return $this->refCalificacionPlantilla;
    }

    /**
     * Set refParcialPlantilla
     *
     * @param string $refParcialPlantilla
     *
     * @return ActividadAcademica
     */
    public function setRefParcialPlantilla($refParcialPlantilla)
    {
        $this->refParcialPlantilla = $refParcialPlantilla;

        return $this;
    }

    /**
     * Get refParcialPlantilla
     *
     * @return string
     */
    public function getRefParcialPlantilla()
    {
        return $this->refParcialPlantilla;
    }

    /**
     * Set fechaPresentacion
     *
     * @param \DateTime $fechaPresentacion
     *
     * @return ActividadAcademica
     */
    public function setFechaPresentacion($fechaPresentacion)
    {
        $this->fechaPresentacion = $fechaPresentacion;

        return $this;
    }

    /**
     * Get fechaPresentacion
     *
     * @return \DateTime
     */
    public function getFechaPresentacion()
    {
        return $this->fechaPresentacion;
    }

    /**
     * Set idAsignaturaPeriodo
     *
     * @param \AppBundle\Entity\AsignaturaPeriodo $idAsignaturaPeriodo
     *
     * @return ActividadAcademica
     */
    public function setIdAsignaturaPeriodo(\AppBundle\Entity\AsignaturaPeriodo $idAsignaturaPeriodo = null)
    {
        $this->idAsignaturaPeriodo = $idAsignaturaPeriodo;

        return $this;
    }

    /**
     * Get idAsignaturaPeriodo
     *
     * @return \AppBundle\Entity\AsignaturaPeriodo
     */
    public function getIdAsignaturaPeriodo()
    {
        return $this->idAsignaturaPeriodo;
    }
}
