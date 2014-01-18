<?php

namespace Nfe102\Bundle\RestoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CodesPostaux
 *
 * @ORM\Table(name="Codes_Postaux")
 * @ORM\Entity
 */
class CodesPostaux
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCodePostal", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NomVille", type="string", length=45, nullable=true)
     */
    private $nomville;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePostal", type="string", length=20, nullable=true)
     */
    private $codepostal;



    /**
     * Get idcodepostal
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomville
     *
     * @param string $nomville
     * @return CodesPostaux
     */
    public function setNomville($nomville)
    {
        $this->nomville = $nomville;
    
        return $this;
    }

    /**
     * Get nomville
     *
     * @return string 
     */
    public function getNomville()
    {
        return $this->nomville;
    }

    /**
     * Set codepostal
     *
     * @param string $codepostal
     * @return CodesPostaux
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;
    
        return $this;
    }

    /**
     * Get codepostal
     *
     * @return string 
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }
    
    public function __toString() {
        return $this->codepostal;
    }
}