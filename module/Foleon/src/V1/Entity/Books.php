<?php

namespace Foleon\V1\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Table(name="books")
 * @ORM\Entity
 */
class Books
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $title;

    /**
     * @var \Foleon\V1\Entity\Authors
     *
     * @ORM\ManyToOne(targetEntity="Foleon\V1\Entity\Authors", fetch="EAGER",inversedBy="books")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $author;


    /**
     * Get id.
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Books
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author.
     *
     * @param \Foleon\V1\Entity\Authors|null $author
     *
     * @return Books
     */
    public function setAuthor(\Foleon\V1\Entity\Authors $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return \Foleon\V1\Entity\Authors|null
     */
    public function getAuthor()
    {
        return $this->author->getName();
    }
}
