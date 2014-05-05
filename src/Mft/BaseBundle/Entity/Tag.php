<?php

namespace Mft\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="Mft\BaseBundle\Repository\TagRepository")
 */
class Tag
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
     * @ORM\Column(name="tag", type="string", length=45, nullable=true)
     */
    private $tag;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Story", mappedBy="tag")
     */
    private $story;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->story = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set tag
     *
     * @param string $tag
     * @return Tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add story
     *
     * @param \Mft\BaseBundle\Entity\Story $story
     * @return Tag
     */
    public function addStory(\Mft\BaseBundle\Entity\Story $story)
    {
        $this->story[] = $story;

        return $this;
    }

    /**
     * Remove story
     *
     * @param \Mft\BaseBundle\Entity\Story $story
     */
    public function removeStory(\Mft\BaseBundle\Entity\Story $story)
    {
        $this->story->removeElement($story);
    }

    /**
     * Get story
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStory()
    {
        return $this->story;
    }
}
