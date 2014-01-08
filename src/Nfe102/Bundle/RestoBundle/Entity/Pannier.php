<?php

namespace Nfe102\Bundle\RestoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pannier
 *
 * @ORM\Table(name="Pannier")
 * @ORM\Entity
 */
class Pannier
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPanier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpanier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePanier", type="datetime", nullable=true)
     */
    private $datepanier;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreatePanier", type="datetime", nullable=true)
     */
    private $datecreatepanier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateUpdatePanier", type="datetime", nullable=true)
     */
    private $dateupdatepanier;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Client", mappedBy="idpanier")
     */
    private $idclient;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produit", inversedBy="idpanier")
     * @ORM\JoinTable(name="ligne_de_panier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idPanier", referencedColumnName="idPanier")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit")
     *   }
     * )
     */
    private $idproduit;

    /**
     * @var \Transporteur
     *
     * @ORM\ManyToOne(targetEntity="Transporteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTransporteur", referencedColumnName="idTransporteur")
     * })
     */
    private $idtransporteur;

    /**
     * @var \CmdFac
     *
     * @ORM\ManyToOne(targetEntity="CmdFac")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCmdFac", referencedColumnName="idCmdFac")
     * })
     */
    private $idcmdfac;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idclient = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get idpanier
     *
     * @return integer 
     */
    public function getIdpanier()
    {
        return $this->idpanier;
    }

    /**
     * Set datepanier
     *
     * @param \DateTime $datepanier
     * @return Pannier
     */
    public function setDatepanier($datepanier)
    {
        $this->datepanier = $datepanier;
    
        return $this;
    }

    /**
     * Get datepanier
     *
     * @return \DateTime 
     */
    public function getDatepanier()
    {
        return $this->datepanier;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Pannier
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set datecreatepanier
     *
     * @param \DateTime $datecreatepanier
     * @return Pannier
     */
    public function setDatecreatepanier($datecreatepanier)
    {
        $this->datecreatepanier = $datecreatepanier;
    
        return $this;
    }

    /**
     * Get datecreatepanier
     *
     * @return \DateTime 
     */
    public function getDatecreatepanier()
    {
        return $this->datecreatepanier;
    }

    /**
     * Set dateupdatepanier
     *
     * @param \DateTime $dateupdatepanier
     * @return Pannier
     */
    public function setDateupdatepanier($dateupdatepanier)
    {
        $this->dateupdatepanier = $dateupdatepanier;
    
        return $this;
    }

    /**
     * Get dateupdatepanier
     *
     * @return \DateTime 
     */
    public function getDateupdatepanier()
    {
        return $this->dateupdatepanier;
    }

    /**
     * Add idclient
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Client $idclient
     * @return Pannier
     */
    public function addIdclient(\Nfe102\Bundle\RestoBundle\Entity\Client $idclient)
    {
        $this->idclient[] = $idclient;
    
        return $this;
    }

    /**
     * Remove idclient
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Client $idclient
     */
    public function removeIdclient(\Nfe102\Bundle\RestoBundle\Entity\Client $idclient)
    {
        $this->idclient->removeElement($idclient);
    }

    /**
     * Get idclient
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdclient()
    {
        return $this->idclient;
    }

    /**
     * Add idproduit
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Produit $idproduit
     * @return Pannier
     */
    public function addIdproduit(\Nfe102\Bundle\RestoBundle\Entity\Produit $idproduit)
    {
        $this->idproduit[] = $idproduit;
    
        return $this;
    }

    /**
     * Remove idproduit
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Produit $idproduit
     */
    public function removeIdproduit(\Nfe102\Bundle\RestoBundle\Entity\Produit $idproduit)
    {
        $this->idproduit->removeElement($idproduit);
    }

    /**
     * Get idproduit
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Set idtransporteur
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Transporteur $idtransporteur
     * @return Pannier
     */
    public function setIdtransporteur(\Nfe102\Bundle\RestoBundle\Entity\Transporteur $idtransporteur = null)
    {
        $this->idtransporteur = $idtransporteur;
    
        return $this;
    }

    /**
     * Get idtransporteur
     *
     * @return \Nfe102\Bundle\RestoBundle\Entity\Transporteur 
     */
    public function getIdtransporteur()
    {
        return $this->idtransporteur;
    }

    /**
     * Set idcmdfac
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\CmdFac $idcmdfac
     * @return Pannier
     */
    public function setIdcmdfac(\Nfe102\Bundle\RestoBundle\Entity\CmdFac $idcmdfac = null)
    {
        $this->idcmdfac = $idcmdfac;
    
        return $this;
    }

    /**
     * Get idcmdfac
     *
     * @return \Nfe102\Bundle\RestoBundle\Entity\CmdFac 
     */
    public function getIdcmdfac()
    {
        return $this->idcmdfac;
    }
}