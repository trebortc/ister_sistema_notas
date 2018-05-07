<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */

class Usuario implements UserInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_NICK", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNick;

    /**
     * @var string
     *
     * @ORM\Column(name="NICK", type="string", length=64, nullable=true)
     */
    private $nick;

    /**
     * @var string
     *
     * @ORM\Column(name="CLAVE", type="string", length=64, nullable=true)
     */
    private $clave;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPO", type="string", length=64, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=1, nullable=true)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_CREACION", type="datetime", nullable=true)
     */
    private $fechaCreacion;



    /**
     * Get idNick
     *
     * @return integer
     */
    public function getIdNick()
    {
        return $this->idNick;
    }

    /**
     * Set nick
     *
     * @param string $nick
     *
     * @return Usuario
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set clave
     *
     * @param string $clave
     *
     * @return Usuario
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Usuario
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Usuario
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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Usuario
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }
    
    //Campo de ayuda para codificar la contraseña
    private $contrasenaPlana;
    
    public function setContrasenaPlana($contrasenaPlana)
    {
        $this->clave = $contrasenaPlana;
    }
    
    public function getContrasenaPlana()
    {
        return $this->contrasenaPlana;
    }
    
    //Metodos implementados por la interfaz UserInterface
    public function getPassword()
    {
        return $this->clave;
    }
    
    public function eraseCredentials()
    {
        
    }
    
    public function getSalt()
    {
        return null;
    }
    
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    
    public function getUsername()
    {
        return $this->nick;
    }
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->idNick,
            $this->nick,
            $this->clave,
            // see section on salt below
            // $this->salt,
        ));
    }
    
    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->idNick,
            $this->nick,
            $this->clave,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }
    
    /**
     * Get string
     *
     * @return string
     */
    public function __toString() {
        return $this->nick;
    }

}
