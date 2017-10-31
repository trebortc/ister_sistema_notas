<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParcialPlantillaDetalle
 *
 * @ORM\Table(name="parcial_plantilla_detalle", indexes={@ORM\Index(name="FK_RELATIONSHIP_12", columns={"ID_PARCIAL_PLANTILLA"})})
 * @ORM\Entity
 */
class ParcialPlantillaDetalle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_PARCIAL_PLANTILLA_DETALLE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idParcialPlantillaDetalle;

    /**
     * @var integer
     *
     * @ORM\Column(name="PORCENTAJE", type="integer", nullable=true)
     */
    private $porcentaje;

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
     * Get idParcialPlantillaDetalle
     *
     * @return integer
     */
    public function getIdParcialPlantillaDetalle()
    {
        return $this->idParcialPlantillaDetalle;
    }

    /**
     * Set porcentaje
     *
     * @param integer $porcentaje
     *
     * @return ParcialPlantillaDetalle
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
     * Set idParcialPlantilla
     *
     * @param \AppBundle\Entity\ParcialPlantilla $idParcialPlantilla
     *
     * @return ParcialPlantillaDetalle
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
}
