<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Profesor
 *
 * @ORM\Table(name="profesor", indexes={@ORM\Index(name="FK_RELATIONSHIP_23", columns={"ID_NICK"})})
 * @ORM\Entity
 */
class Profesor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_PROFESOR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProfesor;

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
     * @ORM\Column(name="TITULO", type="string", length=64, nullable=true)
     */
    private $titulo;

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
     * @ORM\Column(name="CARGO", type="string", length=64, nullable=true)
     */
    private $cargo;

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
     * @ORM\OneToMany(targetEntity="AsignaturaPeriodo", mappedBy="idProfesor")
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
     * Get idProfesor
     *
     * @return integer
     */
    public function getIdProfesor()
    {
        return $this->idProfesor;
    }

    /**
     * Set identificacion
     *
     * @param string $identificacion
     *
     * @return Profesor
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
     * @return Profesor
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
     * @return Profesor
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
     * @return Profesor
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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Profesor
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set celular
     *
     * @param string $celular
     *
     * @return Profesor
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
     * @return Profesor
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
     * @return Profesor
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
     * Set cargo
     *
     * @param string $cargo
     *
     * @return Profesor
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Profesor
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
     * @return Profesor
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
     * Set asignaturasPeriodo
     *
     * @param \AppBundle\Entity\AsignaturaPeriodo $asignaturasPeriodo
     *
     * @return Profesor
     */
    public function setAsignaturasPeriodo(\AppBundle\Entity\AsignaturaPeriodo $asignaturasPeriodo = null)
    {
        $this->asignaturasPeriodo = $asignaturasPeriodo;
        
        return $this;
    }
    
    /**
     * Get asignaturasPeriodo
     *
     * @return \AppBundle\Entity\AsignaturaPeriodo
     */
    public function getAsignaturasPeriodo()
    {
        return $this->asignaturasPeriodo;
    }
    
    public function __toString() {
        return $this->nombres;
    }
}
