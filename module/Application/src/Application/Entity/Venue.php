<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venue
 *
 * @ORM\Table(name="venue")
 * @ORM\Entity
 */
class Venue
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=256, nullable=false)
     */
    private $address;

    /**
     * @var integer
     *
     * @ORM\Column(name="zip", type="integer", nullable=false)
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=256, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="municipality_id", type="integer", nullable=false)
     */
    private $municipalityId;

    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float", precision=10, scale=0, nullable=false)
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="lng", type="float", precision=10, scale=0, nullable=false)
     */
    private $lng;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="phone1", type="string", length=128, nullable=true)
     */
    private $phone1;

    /**
     * @var string
     *
     * @ORM\Column(name="phone2", type="string", length=128, nullable=true)
     */
    private $phone2 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="phone3", type="string", length=128, nullable=true)
     */
    private $phone3 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=256, nullable=true)
     */
    private $url = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="approved", type="boolean", nullable=true)
     */
    private $approved;

    /**
     * @var string
     *
     * @ORM\Column(name="mo_open", type="string", length=128, nullable=false)
     */
    private $moOpen;

    /**
     * @var string
     *
     * @ORM\Column(name="mo_close", type="string", length=128, nullable=false)
     */
    private $moClose;

    /**
     * @var string
     *
     * @ORM\Column(name="tu_open", type="string", length=128, nullable=false)
     */
    private $tuOpen;

    /**
     * @var string
     *
     * @ORM\Column(name="tu_close", type="string", length=128, nullable=false)
     */
    private $tuClose;

    /**
     * @var string
     *
     * @ORM\Column(name="we_open", type="string", length=128, nullable=false)
     */
    private $weOpen;

    /**
     * @var string
     *
     * @ORM\Column(name="we_close", type="string", length=128, nullable=false)
     */
    private $weClose;

    /**
     * @var string
     *
     * @ORM\Column(name="th_open", type="string", length=128, nullable=false)
     */
    private $thOpen;

    /**
     * @var string
     *
     * @ORM\Column(name="th_close", type="string", length=128, nullable=false)
     */
    private $thClose;

    /**
     * @var string
     *
     * @ORM\Column(name="fr_open", type="string", length=128, nullable=false)
     */
    private $frOpen;

    /**
     * @var string
     *
     * @ORM\Column(name="fr_close", type="string", length=128, nullable=false)
     */
    private $frClose;

    /**
     * @var string
     *
     * @ORM\Column(name="sa_open", type="string", length=128, nullable=false)
     */
    private $saOpen;

    /**
     * @var string
     *
     * @ORM\Column(name="sa_close", type="string", length=128, nullable=false)
     */
    private $saClose;

    /**
     * @var string
     *
     * @ORM\Column(name="su_open", type="string", length=128, nullable=false)
     */
    private $suOpen;

    /**
     * @var string
     *
     * @ORM\Column(name="su_close", type="string", length=128, nullable=false)
     */
    private $suClose;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Venue
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip
     *
     * @param integer $zip
     *
     * @return Venue
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return integer
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Venue
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set municipalityId
     *
     * @param integer $municipalityId
     *
     * @return Venue
     */
    public function setMunicipalityId($municipalityId)
    {
        $this->municipalityId = $municipalityId;

        return $this;
    }

    /**
     * Get municipalityId
     *
     * @return integer
     */
    public function getMunicipalityId()
    {
        return $this->municipalityId;
    }

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return Venue
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param float $lng
     *
     * @return Venue
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Venue
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set phone1
     *
     * @param string $phone1
     *
     * @return Venue
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;

        return $this;
    }

    /**
     * Get phone1
     *
     * @return string
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * Set phone2
     *
     * @param string $phone2
     *
     * @return Venue
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * Get phone2
     *
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set phone3
     *
     * @param string $phone3
     *
     * @return Venue
     */
    public function setPhone3($phone3)
    {
        $this->phone3 = $phone3;

        return $this;
    }

    /**
     * Get phone3
     *
     * @return string
     */
    public function getPhone3()
    {
        return $this->phone3;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Venue
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     *
     * @return Venue
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set moOpen
     *
     * @param string $moOpen
     *
     * @return Venue
     */
    public function setMoOpen($moOpen)
    {
        $this->moOpen = $moOpen;

        return $this;
    }

    /**
     * Get moOpen
     *
     * @return string
     */
    public function getMoOpen()
    {
        return $this->moOpen;
    }

    /**
     * Set moClose
     *
     * @param string $moClose
     *
     * @return Venue
     */
    public function setMoClose($moClose)
    {
        $this->moClose = $moClose;

        return $this;
    }

    /**
     * Get moClose
     *
     * @return string
     */
    public function getMoClose()
    {
        return $this->moClose;
    }

    /**
     * Set tuOpen
     *
     * @param string $tuOpen
     *
     * @return Venue
     */
    public function setTuOpen($tuOpen)
    {
        $this->tuOpen = $tuOpen;

        return $this;
    }

    /**
     * Get tuOpen
     *
     * @return string
     */
    public function getTuOpen()
    {
        return $this->tuOpen;
    }

    /**
     * Set tuClose
     *
     * @param string $tuClose
     *
     * @return Venue
     */
    public function setTuClose($tuClose)
    {
        $this->tuClose = $tuClose;

        return $this;
    }

    /**
     * Get tuClose
     *
     * @return string
     */
    public function getTuClose()
    {
        return $this->tuClose;
    }

    /**
     * Set weOpen
     *
     * @param string $weOpen
     *
     * @return Venue
     */
    public function setWeOpen($weOpen)
    {
        $this->weOpen = $weOpen;

        return $this;
    }

    /**
     * Get weOpen
     *
     * @return string
     */
    public function getWeOpen()
    {
        return $this->weOpen;
    }

    /**
     * Set weClose
     *
     * @param string $weClose
     *
     * @return Venue
     */
    public function setWeClose($weClose)
    {
        $this->weClose = $weClose;

        return $this;
    }

    /**
     * Get weClose
     *
     * @return string
     */
    public function getWeClose()
    {
        return $this->weClose;
    }

    /**
     * Set thOpen
     *
     * @param string $thOpen
     *
     * @return Venue
     */
    public function setThOpen($thOpen)
    {
        $this->thOpen = $thOpen;

        return $this;
    }

    /**
     * Get thOpen
     *
     * @return string
     */
    public function getThOpen()
    {
        return $this->thOpen;
    }

    /**
     * Set thClose
     *
     * @param string $thClose
     *
     * @return Venue
     */
    public function setThClose($thClose)
    {
        $this->thClose = $thClose;

        return $this;
    }

    /**
     * Get thClose
     *
     * @return string
     */
    public function getThClose()
    {
        return $this->thClose;
    }

    /**
     * Set frOpen
     *
     * @param string $frOpen
     *
     * @return Venue
     */
    public function setFrOpen($frOpen)
    {
        $this->frOpen = $frOpen;

        return $this;
    }

    /**
     * Get frOpen
     *
     * @return string
     */
    public function getFrOpen()
    {
        return $this->frOpen;
    }

    /**
     * Set frClose
     *
     * @param string $frClose
     *
     * @return Venue
     */
    public function setFrClose($frClose)
    {
        $this->frClose = $frClose;

        return $this;
    }

    /**
     * Get frClose
     *
     * @return string
     */
    public function getFrClose()
    {
        return $this->frClose;
    }

    /**
     * Set saOpen
     *
     * @param string $saOpen
     *
     * @return Venue
     */
    public function setSaOpen($saOpen)
    {
        $this->saOpen = $saOpen;

        return $this;
    }

    /**
     * Get saOpen
     *
     * @return string
     */
    public function getSaOpen()
    {
        return $this->saOpen;
    }

    /**
     * Set saClose
     *
     * @param string $saClose
     *
     * @return Venue
     */
    public function setSaClose($saClose)
    {
        $this->saClose = $saClose;

        return $this;
    }

    /**
     * Get saClose
     *
     * @return string
     */
    public function getSaClose()
    {
        return $this->saClose;
    }

    /**
     * Set suOpen
     *
     * @param string $suOpen
     *
     * @return Venue
     */
    public function setSuOpen($suOpen)
    {
        $this->suOpen = $suOpen;

        return $this;
    }

    /**
     * Get suOpen
     *
     * @return string
     */
    public function getSuOpen()
    {
        return $this->suOpen;
    }

    /**
     * Set suClose
     *
     * @param string $suClose
     *
     * @return Venue
     */
    public function setSuClose($suClose)
    {
        $this->suClose = $suClose;

        return $this;
    }

    /**
     * Get suClose
     *
     * @return string
     */
    public function getSuClose()
    {
        return $this->suClose;
    }
}
