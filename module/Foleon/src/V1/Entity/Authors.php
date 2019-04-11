<?php

namespace Foleon\V1\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ArraySerializable as ArrayHydrator;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Authors
 *
 * @ORM\Table(name="authors")
 * @ORM\Entity
 */
class Authors
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
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Foleon\V1\Entity\Books", fetch="EAGER", mappedBy="author")
     */
    private $books;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

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
     * Set name.
     *
     * @param string|null $name
     *
     * @return Authors
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add book.
     *
     * @param \Foleon\V1\Entity\Books $book
     *
     * @return Authors
     */
    public function addBook(\Foleon\V1\Entity\Books $book)
    {
        $this->books[] = $book;

        return $this;
    }

    /**
     * Remove book.
     *
     * @param \Foleon\V1\Entity\Books $book
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeBook(\Foleon\V1\Entity\Books $book)
    {
        return $this->books->removeElement($book);
    }

    /**
     * Get books.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBooks()
    {
        // $hydrator = new ArrayHydrator();
        // var_dump($this->books->unwrap());
        // die;
        // return $hydrator->extract($this->books);

        // return [['hola' => 'hola'],
        //         ['hola2' => 'hola2']];
        return ($this->books);
        \Doctrine\Common\Util\Debug::dump($this->books);
    }
}
