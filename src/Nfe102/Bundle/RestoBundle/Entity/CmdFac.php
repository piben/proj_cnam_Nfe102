<?php

namespace Nfe102\Bundle\RestoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmdFac
 *
 * @ORM\Table(name="Cmd_fac")
 * @ORM\Entity
 */
class CmdFac
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCmdFac", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="Adress_id_Fac", type="integer", nullable=true)
     */
    private $adressIdFac;

    /**
     * @var \Pannier
     *
     * @ORM\ManyToOne(targetEntity="Pannier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPanier", referencedColumnName="idPanier")
     * })
     */
    private $idpanier;



    /**
     * Get idcmdfac
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set adressIdFac
     *
     * @param integer $adressIdFac
     * @return CmdFac
     */
    public function setAdressIdFac($adressIdFac)
    {
        $this->adressIdFac = $adressIdFac;
    
        return $this;
    }

    /**
     * Get adressIdFac
     *
     * @return integer 
     */
    public function getAdressIdFac()
    {
        return $this->adressIdFac;
    }

    /**
     * Set idpanier
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Pannier $idpanier
     * @return CmdFac
     */
    public function setIdpanier(\Nfe102\Bundle\RestoBundle\Entity\Pannier $idpanier = null)
    {
        $this->idpanier = $idpanier;
    
        return $this;
    }

    /**
     * Get idpanier
     *
     * @return \Nfe102\Bundle\RestoBundle\Entity\Pannier 
     */
    public function getIdpanier()
    {
        return $this->idpanier;
    }
}