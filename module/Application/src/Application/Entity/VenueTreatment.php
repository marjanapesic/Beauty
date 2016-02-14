<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenueTreatment
 *
 * @ORM\Table(name="venue_treatment", uniqueConstraints={@ORM\UniqueConstraint(name="venue_treatment", columns={"venue_id", "treatment_id"})})
 * @ORM\Entity
 */
class VenueTreatment
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
     * @var integer
     *
     * @ORM\Column(name="venue_id", type="integer", nullable=false)
     */
    private $venueId;

    /**
     * @var integer
     *
     * @ORM\Column(name="treatment_id", type="integer", nullable=false)
     */
    private $treatmentId;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;



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
     * Set venueId
     *
     * @param integer $venueId
     *
     * @return VenueTreatment
     */
    public function setVenueId($venueId)
    {
        $this->venueId = $venueId;

        return $this;
    }

    /**
     * Get venueId
     *
     * @return integer
     */
    public function getVenueId()
    {
        return $this->venueId;
    }

    /**
     * Set treatmentId
     *
     * @param integer $treatmentId
     *
     * @return VenueTreatment
     */
    public function setTreatmentId($treatmentId)
    {
        $this->treatmentId = $treatmentId;

        return $this;
    }

    /**
     * Get treatmentId
     *
     * @return integer
     */
    public function getTreatmentId()
    {
        return $this->treatmentId;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return VenueTreatment
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }
}
