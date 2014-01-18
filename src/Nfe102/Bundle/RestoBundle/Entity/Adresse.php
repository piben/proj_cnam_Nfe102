<?php

namespace Nfe102\Bundle\RestoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="Adresse")
 * @ORM\Entity
 */
class Adresse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAdresse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse1", type="string", length=45, nullable=true)
     */
    private $adresse1;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse2", type="string", length=45, nullable=true)
     */
    private $adresse2;

    /**
     * @var string
     *
     * @ORM\Column(name="TypeAdresse", type="string", length=45, nullable=true)
     */
    private $typeadresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreateAdresse", type="datetime", nullable=true)
     */
    private $datecreateadresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateUpdateAdresse", type="datetime", nullable=true)
     */
    private $dateupdateadresse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="idadresse")
     */
    private $iduser;

    /**
     * @var \CodesPostaux
     *
     * @ORM\ManyToOne(targetEntity="CodesPostaux")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCodePostal", referencedColumnName="idCodePostal")
     * })
     */
    private $idcodepostal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idclient = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get idadresse
     *
     * @return integer 
     */
    public function getIdadresse()
    {
        return $this->idadresse;
    }

    /**
     * Set adresse1
     *
     * @param string $adresse1
     * @return Adresse
     */
    public function setAdresse1($adresse1)
    {
        $this->adresse1 = $adresse1;
    
        return $this;
    }

    /**
     * Get adresse1
     *
     * @return string 
     */
    public function getAdresse1()
    {
        return $this->adresse1;
    }

    /**
     * Set adresse2
     *
     * @param string $adresse2
     * @return Adresse
     */
    public function setAdresse2($adresse2)
    {
        $this->adresse2 = $adresse2;
    
        return $this;
    }

    /**
     * Get adresse2
     *
     * @return string 
     */
    public function getAdresse2()
    {
        return $this->adresse2;
    }

    /**
     * Set typeadresse
     *
     * @param string $typeadresse
     * @return Adresse
     */
    public function setTypeadresse($typeadresse)
    {
        $this->typeadresse = $typeadresse;
    
        return $this;
    }

    /**
     * Get typeadresse
     *
     * @return string 
     */
    public function getTypeadresse()
    {
        return $this->typeadresse;
    }

    /**
     * Set datecreateadresse
     *
     * @param \DateTime $datecreateadresse
     * @return Adresse
     */
    public function setDatecreateadresse($datecreateadresse)
    {
        $this->datecreateadresse = $datecreateadresse;
    
        return $this;
    }

    /**
     * Get datecreateadresse
     *
     * @return \DateTime 
     */
    public function getDatecreateadresse()
    {
        return $this->datecreateadresse;
    }

    /**
     * Set dateupdateadresse
     *
     * @param \DateTime $dateupdateadresse
     * @return Adresse
     */
    public function setDateupdateadresse($dateupdateadresse)
    {
        $this->dateupdateadresse = $dateupdateadresse;
    
        return $this;
    }

    /**
     * Get dateupdateadresse
     *
     * @return \DateTime 
     */
    public function getDateupdateadresse()
    {
        return $this->dateupdateadresse;
    }

    /**
     * Add idclient
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\Client $idclient
     * @return Adresse
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
     * Set idcodepostal
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\CodesPostaux $idcodepostal
     * @return Adresse
     */
    public function setIdcodepostal(\Nfe102\Bundle\RestoBundle\Entity\CodesPostaux $idcodepostal = null)
    {
        $this->idcodepostal = $idcodepostal;
    
        return $this;
    }

    /**
     * Get idcodepostal
     *
     * @return \Nfe102\Bundle\RestoBundle\Entity\CodesPostaux 
     */
    public function getIdcodepostal()
    {
        return $this->idcodepostal;
    }

    /**
     * Add iduser
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\User $iduser
     * @return Adresse
     */
    public function addIduser(\Nfe102\Bundle\RestoBundle\Entity\User $iduser)
    {
        $this->iduser[] = $iduser;
    
        return $this;
    }

    /**
     * Remove iduser
     *
     * @param \Nfe102\Bundle\RestoBundle\Entity\User $iduser
     */
    public function removeIduser(\Nfe102\Bundle\RestoBundle\Entity\User $iduser)
    {
        $this->iduser->removeElement($iduser);
    }

    /**
     * Get iduser
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
