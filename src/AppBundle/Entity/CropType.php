<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CropType
 *
 * @ORM\Table(name="crop_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CropTypeRepository")
 */
class CropType
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
     * @ORM\Column(name="cropName", type="string", length=255)
     */
    private $cropName;


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
     * Set cropName
     *
     * @param string $cropName
     *
     * @return CropType
     */
    public function setCropName($cropName)
    {
        $this->cropName = $cropName;

        return $this;
    }

    /**
     * Get cropName
     *
     * @return string
     */
    public function getCropName()
    {
        return $this->cropName;
    }

    public function __toString()
    {
        return $this->getCropName();
    }
}

