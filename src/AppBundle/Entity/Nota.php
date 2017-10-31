<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nota
 *
 * @ORM\Table(name="nota", indexes={@ORM\Index(name="FK_RELATIONSHIP_16", columns={"ID_ESTUDIANTE_ASIGNATURA"}), @ORM\Index(name="FK_RELATIONSHIP_17", columns={"ID_ACTIVIDAD_ACADEMICA"})})
 * @ORM\Entity
 */
class Nota
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_NOTA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNota;

    /**
     * @var string
     *
     * @ORM\Column(name="NOTA_FINAL", type="decimal", precision=2, scale=2, nullable=true)
     */
    private $notaFinal;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=1, nullable=true)
     */
    private $estado;

    /**
     * @var \EstudianteAsignatura
     *
     * @ORM\ManyToOne(targetEntity="EstudianteAsignatura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ESTUDIANTE_ASIGNATURA", referencedColumnName="ID_ESTUDIANTE_ASIGNATURA")
     * })
     */
    private $idEstudianteAsignatura;

    /**
     * @var \ActividadAcademica
     *
     * @ORM\ManyToOne(targetEntity="ActividadAcademica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ACTIVIDAD_ACADEMICA", referencedColumnName="ID_ACTIVIDAD_ACADEMICA")
     * })
     */
    private $idActividadAcademica;



    /**
     * Get idNota
     *
     * @return integer
     */
    public function getIdNota()
    {
        return $this->idNota;
    }

    /**
     * Set notaFinal
     *
     * @param string $notaFinal
     *
     * @return Nota
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
     * Set estado
     *
     * @param string $estado
     *
     * @return Nota
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
     * Set idEstudianteAsignatura
     *
     * @param \AppBundle\Entity\EstudianteAsignatura $idEstudianteAsignatura
     *
     * @return Nota
     */
    public function setIdEstudianteAsignatura(\AppBundle\Entity\EstudianteAsignatura $idEstudianteAsignatura = null)
    {
        $this->idEstudianteAsignatura = $idEstudianteAsignatura;

        return $this;
    }

    /**
     * Get idEstudianteAsignatura
     *
     * @return \AppBundle\Entity\EstudianteAsignatura
     */
    public function getIdEstudianteAsignatura()
    {
        return $this->idEstudianteAsignatura;
    }

    /**
     * Set idActividadAcademica
     *
     * @param \AppBundle\Entity\ActividadAcademica $idActividadAcademica
     *
     * @return Nota
     */
    public function setIdActividadAcademica(\AppBundle\Entity\ActividadAcademica $idActividadAcademica = null)
    {
        $this->idActividadAcademica = $idActividadAcademica;

        return $this;
    }

    /**
     * Get idActividadAcademica
     *
     * @return \AppBundle\Entity\ActividadAcademica
     */
    public function getIdActividadAcademica()
    {
        return $this->idActividadAcademica;
    }
}
