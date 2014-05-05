<?php

namespace Mft\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="fk_post_story1_idx", columns={"story_id"}), @ORM\Index(name="fk_post_writer1_idx", columns={"writer_id"})})
 * @ORM\Entity(repositoryClass="Mft\BaseBundle\Repository\PostRepository")
 */
class Post
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
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="datetime", nullable=true)
     */
    private $createTime;

    /**
     * @var \Story
     *
     * @ORM\ManyToOne(targetEntity="Story")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="story_id", referencedColumnName="id")
     * })
     */
    private $story;

    /**
     * @var \Writer
     *
     * @ORM\ManyToOne(targetEntity="Writer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="writer_id", referencedColumnName="id")
     * })
     */
    private $writer;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Image", inversedBy="post")
     * @ORM\JoinTable(name="post_has_image",
     *   joinColumns={
     *     @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     *   }
     * )
     */
    private $image;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->image = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set text
     *
     * @param string $text
     * @return Post
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return Post
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime 
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set story
     *
     * @param \Mft\BaseBundle\Entity\Story $story
     * @return Post
     */
    public function setStory(\Mft\BaseBundle\Entity\Story $story = null)
    {
        $this->story = $story;

        return $this;
    }

    /**
     * Get story
     *
     * @return \Mft\BaseBundle\Entity\Story 
     */
    public function getStory()
    {
        return $this->story;
    }

    /**
     * Set writer
     *
     * @param \Mft\BaseBundle\Entity\Writer $writer
     * @return Post
     */
    public function setWriter(\Mft\BaseBundle\Entity\Writer $writer = null)
    {
        $this->writer = $writer;

        return $this;
    }

    /**
     * Get writer
     *
     * @return \Mft\BaseBundle\Entity\Writer 
     */
    public function getWriter()
    {
        return $this->writer;
    }

    /**
     * Add image
     *
     * @param \Mft\BaseBundle\Entity\Image $image
     * @return Post
     */
    public function addImage(\Mft\BaseBundle\Entity\Image $image)
    {
        $this->image[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \Mft\BaseBundle\Entity\Image $image
     */
    public function removeImage(\Mft\BaseBundle\Entity\Image $image)
    {
        $this->image->removeElement($image);
    }

    /**
     * Get image
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImage()
    {
        return $this->image;
    }
}
