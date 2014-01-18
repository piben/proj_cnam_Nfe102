<?php

namespace Nfe102\Bundle\RestoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
 */
class User extends BaseUser
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(name="NomClient", type="string", length=45, nullable=true)
     */
    protected $nomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="PrenomClient", type="string", length=45, nullable=true)
     */
    protected $prenomclient;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreateClient", type="datetime", nullable=true)
     */
    protected $datecreateclient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateUpdateClient", type="datetime", nullable=true)
     */
    protected $dateupdateclient;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pannier", inversedBy="idclient")
     * @ORM\JoinTable(name="creer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idPanier", referencedColumnName="idPanier")
     *   }
     * )
     */
    protected $idpanier;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Adresse", inversedBy="idclient")
     * @ORM\JoinTable(name="habite",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idAdresse", referencedColumnName="idAdresse")
     *   }
     * )
     */
    protected $idadresse;

    /**
     * Constructor
     */
//    public function __construct()
//    {
//        $this->idpanier = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->idadresse = new \Doctrine\Common\Collections\ArrayCollection();
//    }
//    

    /**
     * Get idclient
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomclient
     *
     * @param string $nomclient
     * @return User
     */
    public function setNomclient($nomclient)
    {
        $this->nomclient = $nomclient;
    
        return $this;
    }

    /**
     * Get nomclient
     *
     * @return string 
     */
    public function getNomclient()
    {
        return $this->nomclient;
    }

    /**
     * Set prenomclient
     *
     * @param string $prenomclient
     * @return User
     */
    public function setPrenomclient($prenomclient)
    {
        $this->prenomclient = $prenomclient;
    
        return $this;
    }

    /**
     * Get prenomclient
     *
     * @return string 
     */
    public function getPrenomclient()
    {
        return $this->prenomclient;
    }


    /**
     * Set datecreateclient
     *
     * @param \DateTime $datecreateclient
     * @return User
     */
    public function setDatecreateclient($datecreateclient)
    {
        $this->datecreateclient = $datecreateclient;
    
        return $this;
    }

    /**
     * Get datecreateclient
     *
     * @return \DateTime 
     */
    public function getDatecreateclient()
    {
        return $this->datecreateclient;
    }

    /**
     * Set dateupdateclient
     *
     * @param \DateTime $dateupdateclient
     * @return User
     */
    public function setDateupdateclient($dateupdateclient)
    {
        $this->dateupdateclient = $dateupdateclient;
    
        return $this;
    }

    /**
     * Get dateupdateclient
     *
     * @return \DateTime 
     */
    public function getDateupdateclient()
    {
        return $this->dateupdateclient;
    }

    /**
     * Add idpanier
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Pannier $idpanier
     * @return User
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
     * Add idadresse
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Adresse $idadresse
     * @return User
     */
    public function addIdadresse(\Nfe102\Bundle\RestoBundle\Entity\Adresse $idadresse)
    {
        $this->idadresse[] = $idadresse;
    
        return $this;
    }

    /**
     * Remove idadresse
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Adresse $idadresse
     */
    public function removeIdadresse(\Nfe102\Bundle\RestoBundle\Entity\Adresse $idadresse)
    {
        $this->idadresse->removeElement($idadresse);
    }

    /**
     * Get idadresse
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdadresse()
    {
        return $this->idadresse;
    }
}
