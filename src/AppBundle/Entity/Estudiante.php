<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudiante
 *
 * @ORM\Table(name="estudiante", indexes={@ORM\Index(name="FK_RELATIONSHIP_22", columns={"ID_NICK"}), @ORM\Index(name="FK_RELATIONSHIP_25", columns={"ID_CARRERA"})})
 * @ORM\Entity
 */
class Estudiante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ESTUDIANTE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstudiante;

    /**
     * @var string
     *
     * @ORM\Column(name="IDENTIFICACION", type="string", length=14, nullable=true)
     */
    private $identificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPO_IDENTIFICACION", type="string", length=64, nullable=true)
     */
    private $tipoIdentificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRES", type="string", length=64, nullable=true)
     */
    private $nombres;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_NACIMIENTO", type="date", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="CELULAR", type="string", length=12, nullable=true)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="TELEFONO", type="string", length=12, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL", type="string", length=64, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="DIRECCION", type="string", length=256, nullable=true)
     */
    private $direccion;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_NICK", referencedColumnName="ID_NICK")
     * })
     */
    private $idNick;

    /**
     * @var \Carrera
     *
     * @ORM\ManyToOne(targetEntity="Carrera")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CARRERA", referencedColumnName="ID_CARRERA")
     * })
     */
    private $idCarrera;

    /**
     * Get idEstudiante
     *
     * @return integer
     */
    //public function getIdEstudiante()
    public function getId()
    {
        return $this->idEstudiante;
    }

    /**
     * Set identificacion
     *
     * @param string $identificacion
     *
     * @return Estudiante
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get identificacion
     *
     * @return string
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set tipoIdentificacion
     *
     * @param string $tipoIdentificacion
     *
     * @return Estudiante
     */
    public function setTipoIdentificacion($tipoIdentificacion)
    {
        $this->tipoIdentificacion = $tipoIdentificacion;

        return $this;
    }

    /**
     * Get tipoIdentificacion
     *
     * @return string
     */
    public function getTipoIdentificacion()
    {
        return $this->tipoIdentificacion;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     *
     * @return Estudiante
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Estudiante
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set celular
     *
     * @param string $celular
     *
     * @return Estudiante
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Estudiante
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Estudiante
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Estudiante
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set idNick
     *
     * @param \AppBundle\Entity\Usuario $idNick
     *
     * @return Estudiante
     */
    public function setIdNick(\AppBundle\Entity\Usuario $idNick = null)
    {
        $this->idNick = $idNick;

        return $this;
    }

    /**
     * Get idNick
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getIdNick()
    {
        return $this->idNick;
    }

    /**
     * Set idCarrera
     *
     * @param \AppBundle\Entity\Carrera $idCarrera
     *
     * @return Estudiante
     */
    public function setIdCarrera(\AppBundle\Entity\Carrera $idCarrera = null)
    {
        $this->idCarrera = $idCarrera;

        return $this;
    }

    /**
     * Get idCarrera
     *
     * @return \AppBundle\Entity\Carrera
     */
    public function getIdCarrera()
    {
        return $this->idCarrera;
    }
    
}
