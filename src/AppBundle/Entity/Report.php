<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Report
 *
 * @ORM\Table(name="report")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReportRepository")
 */
class Report
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Field")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     */
    private $fieldId;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="culture", type="string", length=255)
     */
    private $culture;

    /**
     * @var \DateTime
     * @Assert\NotBlank
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tractor")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     */
    private $tractorId;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="area", type="string", length=255)
     */
    private $area;


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
     * Set fieldId
     *
     * @param integer $fieldId
     *
     * @return Report
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
     * Set culture
     *
     * @param string $culture
     *
     * @return Report
     */
    public function setCulture($culture)
    {
        $this->culture = $culture;

        return $this;
    }

    /**
     * Get culture
     *
     * @return string
     */
    public function getCulture()
    {
        return $this->culture;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Report
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set tractorId
     *
     * @param integer $tractorId
     *
     * @return Report
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
     * Set area
     *
     * @param string $area
     *
     * @return Report
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }
}

