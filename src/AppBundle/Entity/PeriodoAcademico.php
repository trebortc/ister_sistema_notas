<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * PeriodoAcademico
 *
 * @ORM\Table(name="periodo_academico", indexes={@ORM\Index(name="FK_RELATIONSHIP_13", columns={"ID_PARCIAL_PLANTILLA"})})
 * @ORM\Entity
 */
class PeriodoAcademico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_PERIODO_ACADEMICO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPeriodoAcademico;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_INICIO", type="date", nullable=true)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_FIN", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=1, nullable=true)
     */
    private $estado;

    /**
     * @var \ParcialPlantilla
     *
     * @ORM\ManyToOne(targetEntity="ParcialPlantilla")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PARCIAL_PLANTILLA", referencedColumnName="ID_PARCIAL_PLANTILLA")
     * })
     */
    private $idParcialPlantilla;
    
    /**
     * @ORM\OneToMany(targetEntity="AsignaturaPeriodo", mappedBy="idPeriodoAcademico")
     */
    private $asignaturasPeriodo;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->asignaturasPeriodo = new ArrayCollection();
    }

    /**
     * Get idPeriodoAcademico
     *
     * @return integer
     */
    public function getIdPeriodoAcademico()
    {
        return $this->idPeriodoAcademico;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return PeriodoAcademico
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return PeriodoAcademico
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return PeriodoAcademico
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

    /**
     * Set idParcialPlantilla
     *
     * @param \AppBundle\Entity\ParcialPlantilla $idParcialPlantilla
     *
     * @return PeriodoAcademico
     */
    public function setIdParcialPlantilla(\AppBundle\Entity\ParcialPlantilla $idParcialPlantilla = null)
    {
        $this->idParcialPlantilla = $idParcialPlantilla;

        return $this;
    }

    /**
     * Get idParcialPlantilla
     *
     * @return \AppBundle\Entity\ParcialPlantilla
     */
    public function getIdParcialPlantilla()
    {
        return $this->idParcialPlantilla;
    }
    
    /**
     * Set asignaturasPeriodo
     *
     * @param \AppBundle\Entity\AsignaturaPeriodo $asignaturasPeriodo
     *
     * @return AsignaturaPeriodo
     */
    public function setAsignaturasPeriodo($asignaturasPeriodo = null)
    {
        $this->asignaturasPeriodo = $asignaturasPeriodo;
    }
    
    /**
     * Get idParcialPlantilla
     *
     * @return \AppBundle\Entity\AsignaturaPeriodo
     */
    public function getAsignaturasPeriodo()
    {
        return $this->asignaturasPeriodo;
    }
    
    /**
     * Get string
     *
     * @return string
     */
    public function __toString() {
        return "Periodo ".$this->fechaInicio->format('d/m/Y')." - ".$this->fechaFin->format('d/m/Y');
    }
    
}
