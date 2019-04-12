<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignaturaPeriodo
 *
 * @ORM\Table(name="asignatura_periodo", indexes={@ORM\Index(name="FK_RELATIONSHIP_2", columns={"ID_PERIODO_ACADEMICO"}), @ORM\Index(name="FK_RELATIONSHIP_20", columns={"ID_PROFESOR"}), @ORM\Index(name="FK_RELATIONSHIP_26", columns={"ID_CALIFICACION_PLANTILLA"}), @ORM\Index(name="FK_RELATIONSHIP_3", columns={"ID_ASIGNATURA"}), @ORM\Index(name="FK_RELATIONSHIP_4", columns={"ID_AULA"})})
 * @ORM\Entity
 */
class AsignaturaPeriodo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ASIGNATURA_PERIODO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAsignaturaPeriodo;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=1, nullable=true)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="CREDITOS", type="integer", nullable=true)
     */
    private $creditos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HORA_INICIO", type="time", nullable=true)
     */
    private $horaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HORA_FIN", type="time", nullable=true)
     */
    private $horaFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="CAPACIDAD", type="integer", nullable=true)
     */
    private $capacidad;

    /**
     * @var \PeriodoAcademico
     *
     * @ORM\ManyToOne(targetEntity="PeriodoAcademico" , inversedBy="asignaturasPeriodo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PERIODO_ACADEMICO", referencedColumnName="ID_PERIODO_ACADEMICO")
     * })
     */
    //@ORM\ManyToOne(targetEntity="PeriodoAcademico", inversedBy="asignaturasPeriodo")
    private $idPeriodoAcademico;
    

    /**
     * @var \Profesor
     *
     * @ORM\ManyToOne(targetEntity="Profesor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PROFESOR", referencedColumnName="ID_PROFESOR")
     * })
     */
    private $idProfesor;

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
     * @var \Asignatura
     *
     * @ORM\ManyToOne(targetEntity="Asignatura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ASIGNATURA", referencedColumnName="ID_ASIGNATURA")
     * })
     */
    private $idAsignatura;

    /**
     * @var \Aula
     *
     * @ORM\ManyToOne(targetEntity="Aula")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_AULA", referencedColumnName="ID_AULA")
     * })
     */
    private $idAula;



    /**
     * Get idAsignaturaPeriodo
     *
     * @return integer
     */
    public function getIdAsignaturaPeriodo()
    {
        return $this->idAsignaturaPeriodo;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return AsignaturaPeriodo
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
     * Set creditos
     *
     * @param integer $creditos
     *
     * @return AsignaturaPeriodo
     */
    public function setCreditos($creditos)
    {
        $this->creditos = $creditos;

        return $this;
    }

    /**
     * Get creditos
     *
     * @return integer
     */
    public function getCreditos()
    {
        return $this->creditos;
    }

    /**
     * Set horaInicio
     *
     * @param \DateTime $horaInicio
     *
     * @return AsignaturaPeriodo
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    /**
     * Get horaInicio
     *
     * @return \DateTime
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * Set horaFin
     *
     * @param \DateTime $horaFin
     *
     * @return AsignaturaPeriodo
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

        return $this;
    }

    /**
     * Get horaFin
     *
     * @return \DateTime
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * Set capacidad
     *
     * @param integer $capacidad
     *
     * @return AsignaturaPeriodo
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get capacidad
     *
     * @return integer
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * Set idPeriodoAcademico
     *
     * @param \AppBundle\Entity\PeriodoAcademico $idPeriodoAcademico
     *
     * @return AsignaturaPeriodo
     */
    public function setIdPeriodoAcademico(\AppBundle\Entity\PeriodoAcademico $idPeriodoAcademico = null)
    {
        $this->idPeriodoAcademico = $idPeriodoAcademico;

        return $this;
    }

    /**
     * Get idPeriodoAcademico
     *
     * @return \AppBundle\Entity\PeriodoAcademico
     */
    public function getIdPeriodoAcademico()
    {
        return $this->idPeriodoAcademico;
    }

    /**
     * Set idProfesor
     *
     * @param \AppBundle\Entity\Profesor $idProfesor
     *
     * @return AsignaturaPeriodo
     */
    public function setIdProfesor(\AppBundle\Entity\Profesor $idProfesor = null)
    {
        $this->idProfesor = $idProfesor;

        return $this;
    }

    /**
     * Get idProfesor
     *
     * @return \AppBundle\Entity\Profesor
     */
    public function getIdProfesor()
    {
        return $this->idProfesor;
    }

    /**
     * Set idCalificacionPlantilla
     *
     * @param \AppBundle\Entity\CalificacionPlantilla $idCalificacionPlantilla
     *
     * @return AsignaturaPeriodo
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

    /**
     * Set idAsignatura
     *
     * @param \AppBundle\Entity\Asignatura $idAsignatura
     *
     * @return AsignaturaPeriodo
     */
    public function setIdAsignatura(\AppBundle\Entity\Asignatura $idAsignatura = null)
    {
        $this->idAsignatura = $idAsignatura;

        return $this;
    }

    /**
     * Get idAsignatura
     *
     * @return \AppBundle\Entity\Asignatura
     */
    public function getIdAsignatura()
    {
        return $this->idAsignatura;
    }

    /**
     * Set idAula
     *
     * @param \AppBundle\Entity\Aula $idAula
     *
     * @return AsignaturaPeriodo
     */
    public function setIdAula(\AppBundle\Entity\Aula $idAula = null)
    {
        $this->idAula = $idAula;

        return $this;
    }

    /**
     * Get idAula
     *
     * @return \AppBundle\Entity\Aula
     */
    public function getIdAula()
    {
        return $this->idAula;
    }
}
