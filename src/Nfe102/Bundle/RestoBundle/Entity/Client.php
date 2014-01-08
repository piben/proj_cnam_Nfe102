<?php

namespace Nfe102\Bundle\RestoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="Client")
 * @ORM\Entity
 */
class Client
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclient;

    /**
     * @var string
     *
     * @ORM\Column(name="NomClient", type="string", length=45, nullable=true)
     */
    private $nomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="PrenomClient", type="string", length=45, nullable=true)
     */
    private $prenomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="MailClient", type="string", length=45, nullable=true)
     */
    private $mailclient;

    /**
     * @var string
     *
     * @ORM\Column(name="PasswordClient", type="string", length=45, nullable=true)
     */
    private $passwordclient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreateClient", type="datetime", nullable=true)
     */
    private $datecreateclient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateUpdateClient", type="datetime", nullable=true)
     */
    private $dateupdateclient;

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
    private $idpanier;

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
    private $idadresse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idpanier = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idadresse = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get idclient
     *
     * @return integer 
     */
    public function getIdclient()
    {
        return $this->idclient;
    }

    /**
     * Set nomclient
     *
     * @param string $nomclient
     * @return Client
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
     * @return Client
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
     * Set mailclient
     *
     * @param string $mailclient
     * @return Client
     */
    public function setMailclient($mailclient)
    {
        $this->mailclient = $mailclient;
    
        return $this;
    }

    /**
     * Get mailclient
     *
     * @return string 
     */
    public function getMailclient()
    {
        return $this->mailclient;
    }

    /**
     * Set passwordclient
     *
     * @param string $passwordclient
     * @return Client
     */
    public function setPasswordclient($passwordclient)
    {
        $this->passwordclient = $passwordclient;
    
        return $this;
    }

    /**
     * Get passwordclient
     *
     * @return string 
     */
    public function getPasswordclient()
    {
        return $this->passwordclient;
    }

    /**
     * Set datecreateclient
     *
     * @param \DateTime $datecreateclient
     * @return Client
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
     * @return Client
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
     * @return Client
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
     * @return Client
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