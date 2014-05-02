<?php

namespace Mft\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Story
 *
 * @ORM\Table(name="story", indexes={@ORM\Index(name="fk_story_story_type_idx", columns={"story_type_id"}), @ORM\Index(name="fk_story_writer1_idx", columns={"writer_id"})})
 * @ORM\Entity(repositoryClass="Mft\BaseBundle\Entity")
 */
class Story
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

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
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=true)
     */
    private $views = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="likes", type="integer", nullable=true)
     */
    private $likes = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="secure_link", type="string", length=255, nullable=true)
     */
    private $secureLink;

    /**
     * @var boolean
     *
     * @ORM\Column(name="multi_writers", type="boolean", nullable=true)
     */
    private $multiWriters;

    /**
     * @var boolean
     *
     * @ORM\Column(name="secure", type="boolean", nullable=true)
     */
    private $secure = '0';

    /**
     * @var \StoryType
     *
     * @ORM\ManyToOne(targetEntity="StoryType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="story_type_id", referencedColumnName="id")
     * })
     */
    private $storyType;

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
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="story")
     * @ORM\JoinTable(name="story_has_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="story_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Story
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Story
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
     * @return Story
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
     * Set views
     *
     * @param integer $views
     * @return Story
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Get views
     *
     * @return integer 
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     * @return Story
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return integer 
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set secureLink
     *
     * @param string $secureLink
     * @return Story
     */
    public function setSecureLink($secureLink)
    {
        $this->secureLink = $secureLink;

        return $this;
    }

    /**
     * Get secureLink
     *
     * @return string 
     */
    public function getSecureLink()
    {
        return $this->secureLink;
    }

    /**
     * Set multiWriters
     *
     * @param boolean $multiWriters
     * @return Story
     */
    public function setMultiWriters($multiWriters)
    {
        $this->multiWriters = $multiWriters;

        return $this;
    }

    /**
     * Get multiWriters
     *
     * @return boolean 
     */
    public function getMultiWriters()
    {
        return $this->multiWriters;
    }

    /**
     * Set secure
     *
     * @param boolean $secure
     * @return Story
     */
    public function setSecure($secure)
    {
        $this->secure = $secure;

        return $this;
    }

    /**
     * Get secure
     *
     * @return boolean 
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * Set storyType
     *
     * @param \Mft\BaseBundle\Entity\StoryType $storyType
     * @return Story
     */
    public function setStoryType(\Mft\BaseBundle\Entity\StoryType $storyType = null)
    {
        $this->storyType = $storyType;

        return $this;
    }

    /**
     * Get storyType
     *
     * @return \Mft\BaseBundle\Entity\StoryType 
     */
    public function getStoryType()
    {
        return $this->storyType;
    }

    /**
     * Set writer
     *
     * @param \Mft\BaseBundle\Entity\Writer $writer
     * @return Story
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
     * Add tag
     *
     * @param \Mft\BaseBundle\Entity\Tag $tag
     * @return Story
     */
    public function addTag(\Mft\BaseBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Mft\BaseBundle\Entity\Tag $tag
     */
    public function removeTag(\Mft\BaseBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }
}
