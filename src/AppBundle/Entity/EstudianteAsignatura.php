<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstudianteAsignatura
 *
 * @ORM\Table(name="estudiante_asignatura", indexes={@ORM\Index(name="FK_RELATIONSHIP_21", columns={"ID_ESTUDIANTE"}), @ORM\Index(name="FK_RELATIONSHIP_6", columns={"ID_ASIGNATURA_PERIODO"})})
 * @ORM\Entity
 */
class EstudianteAsignatura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ESTUDIANTE_ASIGNATURA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstudianteAsignatura;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=1, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="NOTA_FINAL", type="decimal", precision=2, scale=2, nullable=true)
     */
    private $notaFinal;

    /**
     * @var \Estudiante
     *
     * @ORM\ManyToOne(targetEntity="Estudiante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ESTUDIANTE", referencedColumnName="ID_ESTUDIANTE")
     * })
     */
    private $idEstudiante;

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
     * Get idEstudianteAsignatura
     *
     * @return integer
     */
    public function getIdEstudianteAsignatura()
    {
        return $this->idEstudianteAsignatura;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return EstudianteAsignatura
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
     * Set notaFinal
     *
     * @param string $notaFinal
     *
     * @return EstudianteAsignatura
     */
    public function setNotaFinal($notaFinal)
    {
        $this->notaFinal = $notaFinal;

        return $this;
    }

    /**
     * Get notaFinal
     *
     * @return string
     */
    public function getNotaFinal()
    {
        return $this->notaFinal;
    }

    /**
     * Set idEstudiante
     *
     * @param \AppBundle\Entity\Estudiante $idEstudiante
     *
     * @return EstudianteAsignatura
     */
    public function setIdEstudiante(\AppBundle\Entity\Estudiante $idEstudiante = null)
    {
        $this->idEstudiante = $idEstudiante;

        return $this;
    }

    /**
     * Get idEstudiante
     *
     * @return \AppBundle\Entity\Estudiante
     */
    public function getIdEstudiante()
    {
        return $this->idEstudiante;
    }

    /**
     * Set idAsignaturaPeriodo
     *
     * @param \AppBundle\Entity\AsignaturaPeriodo $idAsignaturaPeriodo
     *
     * @return EstudianteAsignatura
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
