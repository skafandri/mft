<?php

namespace Mft\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoryType
 *
 * @ORM\Table(name="story_type")
 * @ORM\Entity(repositoryClass="Mft\BaseBundle\Entity")
 */
class StoryType
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
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_post_size", type="integer", nullable=true)
     */
    private $maxPostSize;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;



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
     * Set type
     *
     * @param string $type
     * @return StoryType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set maxPostSize
     *
     * @param integer $maxPostSize
     * @return StoryType
     */
    public function setMaxPostSize($maxPostSize)
    {
        $this->maxPostSize = $maxPostSize;

        return $this;
    }

    /**
     * Get maxPostSize
     *
     * @return integer 
     */
    public function getMaxPostSize()
    {
        return $this->maxPostSize;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return StoryType
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
}
