<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Respuestas
 *
 * @ORM\Table(name="respuestas", indexes={@ORM\Index(name="FK_RELATIONSHIP_19", columns={"ID_ACTIVIDAD_INFORMATIVA"}), @ORM\Index(name="FK_RELATIONSHIP_24", columns={"ID_NICK"}), @ORM\Index(name="FK_RESPUESTAS_RELACIONADAS", columns={"RES_ID_RESPUESTA"})})
 * @ORM\Entity
 */
class Respuestas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_RESPUESTA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRespuesta;

    /**
     * @var string
     *
     * @ORM\Column(name="MENSAJE", type="string", length=256, nullable=true)
     */
    private $mensaje;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var \ActividadInformativa
     *
     * @ORM\ManyToOne(targetEntity="ActividadInformativa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ACTIVIDAD_INFORMATIVA", referencedColumnName="ID_ACTIVIDAD_INFORMATIVA")
     * })
     */
    private $idActividadInformativa;

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
     * @var \Respuestas
     *
     * @ORM\ManyToOne(targetEntity="Respuestas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RES_ID_RESPUESTA", referencedColumnName="ID_RESPUESTA")
     * })
     */
    private $resRespuesta;



    /**
     * Get idRespuesta
     *
     * @return integer
     */
    public function getIdRespuesta()
    {
        return $this->idRespuesta;
    }

    /**
     * Set mensaje
     *
     * @param string $mensaje
     *
     * @return Respuestas
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Respuestas
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set idActividadInformativa
     *
     * @param \AppBundle\Entity\ActividadInformativa $idActividadInformativa
     *
     * @return Respuestas
     */
    public function setIdActividadInformativa(\AppBundle\Entity\ActividadInformativa $idActividadInformativa = null)
    {
        $this->idActividadInformativa = $idActividadInformativa;

        return $this;
    }

    /**
     * Get idActividadInformativa
     *
     * @return \AppBundle\Entity\ActividadInformativa
     */
    public function getIdActividadInformativa()
    {
        return $this->idActividadInformativa;
    }

    /**
     * Set idNick
     *
     * @param \AppBundle\Entity\Usuario $idNick
     *
     * @return Respuestas
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
     * Set resRespuesta
     *
     * @param \AppBundle\Entity\Respuestas $resRespuesta
     *
     * @return Respuestas
     */
    public function setResRespuesta(\AppBundle\Entity\Respuestas $resRespuesta = null)
    {
        $this->resRespuesta = $resRespuesta;

        return $this;
    }

    /**
     * Get resRespuesta
     *
     * @return \AppBundle\Entity\Respuestas
     */
    public function getResRespuesta()
    {
        return $this->resRespuesta;
    }
}
