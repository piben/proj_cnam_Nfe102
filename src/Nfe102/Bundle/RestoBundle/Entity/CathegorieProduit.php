<?php

namespace Nfe102\Bundle\RestoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CathegorieProduit
 *
 * @ORM\Table(name="Cathegorie_Produit")
 * @ORM\Entity
 */
class CathegorieProduit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCathegorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreateCat", type="datetime", nullable=true)
     */
    private $datecreatecat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateUpdateCat", type="datetime", nullable=true)
     */
    private $dateupdatecat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produit", mappedBy="idcathegorie")
     */
    private $idproduit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get idcathegorie
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return CathegorieProduit
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set datecreatecat
     *
     * @param \DateTime $datecreatecat
     * @return CathegorieProduit
     */
    public function setDatecreatecat($datecreatecat)
    {
        $this->datecreatecat = $datecreatecat;
    
        return $this;
    }

    /**
     * Get datecreatecat
     *
     * @return \DateTime 
     */
    public function getDatecreatecat()
    {
        return $this->datecreatecat;
    }

    /**
     * Set dateupdatecat
     *
     * @param \DateTime $dateupdatecat
     * @return CathegorieProduit
     */
    public function setDateupdatecat($dateupdatecat)
    {
        $this->dateupdatecat = $dateupdatecat;
    
        return $this;
    }

    /**
     * Get dateupdatecat
     *
     * @return \DateTime 
     */
    public function getDateupdatecat()
    {
        return $this->dateupdatecat;
    }

    /**
     * Add idproduit
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Produit $idproduit
     * @return CathegorieProduit
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
    
    public function __toString() {
    return $this->type; 
    }
}