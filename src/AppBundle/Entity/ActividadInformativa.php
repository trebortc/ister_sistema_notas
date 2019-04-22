<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ActividadInformativa
 *
 * @ORM\Table(name="actividad_informativa", indexes={@ORM\Index(name="FK_RELATIONSHIP_18", columns={"ID_ASIGNATURA_PERIODO"})})
 * @ORM\Entity
 */
class ActividadInformativa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ACTIVIDAD_INFORMATIVA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActividadInformativa;

    /**
     * @var string
     *
     * @ORM\Column(name="TITULO", type="string", length=64, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=1024, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="IMAGEN", type="string", length=256, nullable=true)
     * 
     * @Assert\NotBlank(message="Por favor, subir el recurso de activiad informativa como un archivo PDF")
     * @Assert\Image()
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="ARCHIVO_ADJUNTO", type="string", length=256, nullable=true)
     * 
     * @Assert\NotBlank(message="Por favor, subir el recurso de activiad informativa como un archivo PDF")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $archivoAdjunto;

    /**
     * @var string
     *
     * @ORM\Column(name="LINK", type="string", length=256, nullable=true)
     */
    private $link;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_PUBLICACION", type="datetime", nullable=true)
     */
    private $fechaPublicacion;

    /**
     * @var \AsignaturaPeriodo
     *
     * @ORM\ManyToOne(targetEntity="AsignaturaPeriodo", inversedBy="asignaturaPeriodoActividades" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ASIGNATURA_PERIODO", referencedColumnName="ID_ASIGNATURA_PERIODO")
     * })
     */
    private $idAsignaturaPeriodo;



    /**
     * Get idActividadInformativa
     *
     * @return integer
     */
    public function getIdActividadInformativa()
    {
        return $this->idActividadInformativa;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return ActividadInformativa
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return ActividadInformativa
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
     * Set imagen
     *
     * @param string $imagen
     *
     * @return ActividadInformativa
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set archivoAdjunto
     *
     * @param string $archivoAdjunto
     *
     * @return ActividadInformativa
     */
    public function setArchivoAdjunto($archivoAdjunto)
    {
        $this->archivoAdjunto = $archivoAdjunto;

        return $this;
    }

    /**
     * Get archivoAdjunto
     *
     * @return string
     */
    public function getArchivoAdjunto()
    {
        return $this->archivoAdjunto;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return ActividadInformativa
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set fechaPublicacion
     *
     * @param \DateTime $fechaPublicacion
     *
     * @return ActividadInformativa
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;

        return $this;
    }

    /**
     * Get fechaPublicacion
     *
     * @return \DateTime
     */
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    /**
     * Set idAsignaturaPeriodo
     *
     * @param \AppBundle\Entity\AsignaturaPeriodo $idAsignaturaPeriodo
     *
     * @return ActividadInformativa
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
    
    public function __toString() {
        return $this->descripcion;
    }
    
    
}
