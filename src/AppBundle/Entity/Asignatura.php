<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asignatura
 *
 * @ORM\Table(name="asignatura")
 * @ORM\Entity
 */
class Asignatura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ASIGNATURA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAsignatura;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=64, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=1024, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="NIVEL", type="integer", nullable=true)
     */
    private $nivel;

    /**
     * @var integer
     *
     * @ORM\Column(name="CREDITOS", type="integer", nullable=true)
     */
    private $creditos;



    /**
     * Get idAsignatura
     *
     * @return integer
     */
    public function getIdAsignatura()
    {
        return $this->idAsignatura;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Asignatura
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Asignatura
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
     * Set nivel
     *
     * @param integer $nivel
     *
     * @return Asignatura
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set creditos
     *
     * @param integer $creditos
     *
     * @return Asignatura
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
}
