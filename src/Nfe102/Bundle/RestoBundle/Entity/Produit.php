<?php

namespace Nfe102\Bundle\RestoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="Produit")
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idProduit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Descrition", type="string", length=45, nullable=true)
     */
    private $descrition;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="string", length=45, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix", type="string", length=45, nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="dispo", type="string", length=7, nullable=true)
     */
    private $dispo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreateProd", type="datetime", nullable=true)
     */
    private $datecreateprod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateUpdateProd", type="datetime", nullable=true)
     */
    private $dateupdateprod;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pannier", mappedBy="idproduit")
     */
    private $idpanier;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CathegorieProduit", inversedBy="idproduit")
     * @ORM\JoinTable(name="classe",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idCathegorie", referencedColumnName="idCathegorie")
     *   }
     * )
     */
    private $idcathegorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idpanier = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idcathegorie = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get idproduit
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Produit
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set descrition
     *
     * @param string $descrition
     * @return Produit
     */
    public function setDescrition($descrition)
    {
        $this->descrition = $descrition;
    
        return $this;
    }

    /**
     * Get descrition
     *
     * @return string 
     */
    public function getDescrition()
    {
        return $this->descrition;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Produit
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set prix
     *
     * @param string $prix
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return string 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set dispo
     *
     * @param string $dispo
     * @return Produit
     */
    public function setDispo($dispo)
    {
        $this->dispo = $dispo;
    
        return $this;
    }

    /**
     * Get dispo
     *
     * @return string 
     */
    public function getDispo()
    {
        return $this->dispo;
    }

    /**
     * Set datecreateprod
     *
     * @param \DateTime $datecreateprod
     * @return Produit
     */
    public function setDatecreateprod($datecreateprod)
    {
        $this->datecreateprod = $datecreateprod;
    
        return $this;
    }

    /**
     * Get datecreateprod
     *
     * @return \DateTime 
     */
    public function getDatecreateprod()
    {
        return $this->datecreateprod;
    }

    /**
     * Set dateupdateprod
     *
     * @param \DateTime $dateupdateprod
     * @return Produit
     */
    public function setDateupdateprod($dateupdateprod)
    {
        $this->dateupdateprod = $dateupdateprod;
    
        return $this;
    }

    /**
     * Get dateupdateprod
     *
     * @return \DateTime 
     */
    public function getDateupdateprod()
    {
        return $this->dateupdateprod;
    }

    /**
     * Add idpanier
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Pannier $idpanier
     * @return Produit
     */
    public function addIdpanier(\Nfe102\Bundle\RestoBundle\Entity\Pannier $idpanier)
    {
        $this->idpanier[] = $idpanier;
    
        return $this;
    }

    /**
     * Remove idpanier
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Pannier $idpanier
     */
    public function removeIdpanier(\Nfe102\Bundle\RestoBundle\Entity\Pannier $idpanier)
    {
        $this->idpanier->removeElement($idpanier);
    }

    /**
     * Get idpanier
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdpanier()
    {
        return $this->idpanier;
    }

    /**
     * Add idcathegorie
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\CathegorieProduit $idcathegorie
     * @return Produit
     */
    public function addIdcathegorie(\Nfe102\Bundle\RestoBundle\Entity\CathegorieProduit $idcathegorie)
    {
        $this->idcathegorie[] = $idcathegorie;
    
        return $this;
    }

    /**
     * Remove idcathegorie
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\CathegorieProduit $idcathegorie
     */
    public function removeIdcathegorie(\Nfe102\Bundle\RestoBundle\Entity\CathegorieProduit $idcathegorie)
    {
        $this->idcathegorie->removeElement($idcathegorie);
    }

    /**
     * Get idcathegorie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdcathegorie()
    {
        return $this->idcathegorie;
    }
}