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
    private $id;

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
     * @ORM\ManyToMany(targetEntity="User", mappedBy="idpanier")
     */
    private $user;

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
     * @var \CmdFac
     *
     * @ORM\ManyToOne(targetEntity="CmdFac")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCmdFac", referencedColumnName="idCmdFac")
     * })
     */
    private $idcmdfac;

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
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get idpanier
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
     * Add user
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\User $user
     * @return Pannier
     */
    public function addUser(\Nfe102\Bundle\RestoBundle\Entity\User $user)
    {
        $this->user[] = $user;
    
        return $this;
    }

    /**
     * Remove user
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\User $user
     */
    public function removeUser(\Nfe102\Bundle\RestoBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
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
}