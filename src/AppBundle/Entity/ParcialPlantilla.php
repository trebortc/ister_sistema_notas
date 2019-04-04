<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParcialPlantilla
 *
 * @ORM\Table(name="parcial_plantilla")
 * @ORM\Entity
 */
class ParcialPlantilla
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_PARCIAL_PLANTILLA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idParcialPlantilla;

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
     * @var string
     *
     * @ORM\Column(name="NOTA_APRUEBA", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $notaAprueba;



    /**
     * Get idParcialPlantilla
     *
     * @return integer
     */
    public function getIdParcialPlantilla()
    {
        return $this->idParcialPlantilla;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ParcialPlantilla
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
     * @return ParcialPlantilla
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
     * Set notaAprueba
     *
     * @param string $notaAprueba
     *
     * @return ParcialPlantilla
     */
    public function setNotaAprueba($notaAprueba)
    {
        $this->notaAprueba = $notaAprueba;

        return $this;
    }

    /**
     * Get notaAprueba
     *
     * @return string
     */
    public function getNotaAprueba()
    {
        return $this->notaAprueba;
    }
}
