<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VenueTreatmentWorker
 *
 * @ORM\Table(name="venue_treatment_worker", uniqueConstraints={@ORM\UniqueConstraint(name="venue_treatment_worker", columns={"venue_id", "treatment_id", "worker_id"})})
 * @ORM\Entity
 */
class VenueTreatmentWorker
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
     * @ORM\Column(name="worker_id", type="integer", nullable=false)
     */
    private $workerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer", nullable=false)
     */
    private $duration;



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
     * @return VenueTreatmentWorker
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
     * @return VenueTreatmentWorker
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
     * Set workerId
     *
     * @param integer $workerId
     *
     * @return VenueTreatmentWorker
     */
    public function setWorkerId($workerId)
    {
        $this->workerId = $workerId;

        return $this;
    }

    /**
     * Get workerId
     *
     * @return integer
     */
    public function getWorkerId()
    {
        return $this->workerId;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return VenueTreatmentWorker
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }
}
