<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario_campos_afin
 *
 * @ORM\Table(name="usuario_campos_afin")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Usuario_campos_afinRepository")
 */
class Usuario_campos_afin
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="usuario_id", type="integer", nullable=true)
     */
    private $usuarioId;

    /**
     * @var int
     *
     * @ORM\Column(name="campo_afin_id", type="integer", nullable=true)
     */
    private $campoAfinId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usuarioId
     *
     * @param integer $usuarioId
     *
     * @return Usuario_campos_afin
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    /**
     * Get usuarioId
     *
     * @return int
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * Set campoAfinId
     *
     * @param integer $campoAfinId
     *
     * @return Usuario_campos_afin
     */
    public function setCampoAfinId($campoAfinId)
    {
        $this->campoAfinId = $campoAfinId;

        return $this;
    }

    /**
     * Get campoAfinId
     *
     * @return int
     */
    public function getCampoAfinId()
    {
        return $this->campoAfinId;
    }
}

