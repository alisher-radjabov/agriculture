<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Field
 *
 * @ORM\Table(name="field")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FieldRepository")
 */
class Field
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
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="fieldName", type="string", length=255)
     */
    private $fieldName;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CropType")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     */
    private $cropType;

    /**
     * @var int
     * @Assert\NotBlank
     * @ORM\Column(name="area", type="integer")
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
     * Set fieldName
     *
     * @param string $fieldName
     *
     * @return Field
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * Get fieldName
     *
     * @return string
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * Set cropType
     *
     * @param string $cropType
     *
     * @return Field
     */
    public function setCropType($cropType)
    {
        $this->cropType = $cropType;

        return $this;
    }

    /**
     * Get cropType
     *
     * @return string
     */
    public function getCropType()
    {
        return $this->cropType;
    }

    /**
     * Set area
     *
     * @param integer $area
     *
     * @return Field
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return int
     */
    public function getArea()
    {
        return $this->area;
    }

    public function __toString()
    {
        return $this->getFieldName();
    }
}

