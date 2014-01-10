<?php

namespace Nfe102\Bundle\RestoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transporteur
 *
 * @ORM\Table(name="Transporteur")
 * @ORM\Entity
 */
class Transporteur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTransporteur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NomTransporteur", type="string", length=45, nullable=true)
     */
    private $nomtransporteur;

    /**
     * @var string
     *
     * @ORM\Column(name="TelTransporteur", type="string", length=45, nullable=true)
     */
    private $teltransporteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreateTrans", type="datetime", nullable=true)
     */
    private $datecreatetrans;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateUpdateTrans", type="datetime", nullable=true)
     */
    private $dateupdatetrans;



    /**
     * Get idtransporteur
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomtransporteur
     *
     * @param string $nomtransporteur
     * @return Transporteur
     */
    public function setNomtransporteur($nomtransporteur)
    {
        $this->nomtransporteur = $nomtransporteur;
    
        return $this;
    }

    /**
     * Get nomtransporteur
     *
     * @return string 
     */
    public function getNomtransporteur()
    {
        return $this->nomtransporteur;
    }

    /**
     * Set teltransporteur
     *
     * @param string $teltransporteur
     * @return Transporteur
     */
    public function setTeltransporteur($teltransporteur)
    {
        $this->teltransporteur = $teltransporteur;
    
        return $this;
    }

    /**
     * Get teltransporteur
     *
     * @return string 
     */
    public function getTeltransporteur()
    {
        return $this->teltransporteur;
    }

    /**
     * Set datecreatetrans
     *
     * @param \DateTime $datecreatetrans
     * @return Transporteur
     */
    public function setDatecreatetrans($datecreatetrans)
    {
        $this->datecreatetrans = $datecreatetrans;
    
        return $this;
    }

    /**
     * Get datecreatetrans
     *
     * @return \DateTime 
     */
    public function getDatecreatetrans()
    {
        return $this->datecreatetrans;
    }

    /**
     * Set dateupdatetrans
     *
     * @param \DateTime $dateupdatetrans
     * @return Transporteur
     */
    public function setDateupdatetrans($dateupdatetrans)
    {
        $this->dateupdatetrans = $dateupdatetrans;
    
        return $this;
    }

    /**
     * Get dateupdatetrans
     *
     * @return \DateTime 
     */
    public function getDateupdatetrans()
    {
        return $this->dateupdatetrans;
    }
}