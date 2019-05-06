<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Process
 *
 * @ORM\Table(name="process")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProcessRepository")
 */
class Process
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tractor")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     */
    private $tractorId;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Field")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     */
    private $fieldId;

    /**
     * @var \DateTime
     * @Assert\NotBlank
     * @ORM\Column(name="process_date", type="datetime")
     */
    private $processDate;

    /**
     * @var int
     * @Assert\NotBlank
     * @ORM\Column(name="area_id", type="integer")
     */
    private $areaId;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tractorId
     *
     * @param integer $tractorId
     *
     * @return Process
     */
    public function setTractorId($tractorId)
    {
        $this->tractorId = $tractorId;

        return $this;
    }

    /**
     * Get tractorId
     *
     * @return int
     */
    public function getTractorId()
    {
        return $this->tractorId;
    }

    /**
     * Set fieldId
     *
     * @param integer $fieldId
     *
     * @return Process
     */
    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId;

        return $this;
    }

    /**
     * Get fieldId
     *
     * @return int
     */
    public function getFieldId()
    {
        return $this->fieldId;
    }

    /**
     * Set processDate
     *
     * @param \DateTime $processDate
     *
     * @return Process
     */
    public function setProcessDate($processDate)
    {
        $this->processDate = $processDate;

        return $this;
    }

    /**
     * Get processDate
     *
     * @return \DateTime
     */
    public function getProcessDate()
    {
        return $this->processDate;
    }

    /**
     * Set areaId
     *
     * @param integer $areaId
     *
     * @return Process
     */
    public function setAreaId($areaId)
    {
        $this->areaId = $areaId;

        return $this;
    }

    /**
     * Get areaId
     *
     * @return int
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

}

