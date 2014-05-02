<?php

namespace Mft\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Writer
 *
 * @ORM\Table(name="writer")
 * @ORM\Entity(repositoryClass="Mft\BaseBundle\Entity")
 */
class Writer
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
     * @ORM\Column(name="screenname", type="string", length=45, nullable=true)
     */
    private $screenname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=100, nullable=true)
     */
    private $avatar;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="datetime", nullable=true)
     */
    private $createTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="story_count", type="integer", nullable=true)
     */
    private $storyCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="post_count", type="integer", nullable=true)
     */
    private $postCount;



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
     * Set screenname
     *
     * @param string $screenname
     * @return Writer
     */
    public function setScreenname($screenname)
    {
        $this->screenname = $screenname;

        return $this;
    }

    /**
     * Get screenname
     *
     * @return string 
     */
    public function getScreenname()
    {
        return $this->screenname;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Writer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return Writer
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return Writer
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
     * Set storyCount
     *
     * @param integer $storyCount
     * @return Writer
     */
    public function setStoryCount($storyCount)
    {
        $this->storyCount = $storyCount;

        return $this;
    }

    /**
     * Get storyCount
     *
     * @return integer 
     */
    public function getStoryCount()
    {
        return $this->storyCount;
    }

    /**
     * Set postCount
     *
     * @param integer $postCount
     * @return Writer
     */
    public function setPostCount($postCount)
    {
        $this->postCount = $postCount;

        return $this;
    }

    /**
     * Get postCount
     *
     * @return integer 
     */
    public function getPostCount()
    {
        return $this->postCount;
    }
}
