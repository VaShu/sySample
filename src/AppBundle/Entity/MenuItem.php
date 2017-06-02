<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="menu_item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MenuItemRepository")
 */
class MenuItem implements \JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $title;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $url;



	/**
	 * @var  MenuItem $parent
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MenuItem", inversedBy="childs")
	 */
	private $parent;

	/**
	 * @var Collection
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\MenuItem", mappedBy="parent")
	 *
	 */
	private $childs;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->childs = new ArrayCollection();
	}


	public function getId()
    {
        return $this->id;
    }

	/**
	 * @param MenuItem $childs
	 */
	public function addUsers(MenuItem $childs)
	{
		$this->childs[] = $childs;
	}

	/**
	 * @param MenuItem $childs
	 */
	public function removeUserThirdManagers(MenuItem $childs)
	{
		$this->childs->removeElement($childs);
	}

	/**
	 * Get childs
	 *
	 * @return Collection
	 */
	public function getChilds() {
		return $this->childs;
	}

	/**
	 * @return MenuItem
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * @param MenuItem $parent
	 */
	public function setParent( $parent ) {
		$this->parent = $parent;
	}

	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @param string $url
	 */
	public function setUrl( $url ) {
		$this->url = $url;
	}

	/**
	 * {@inheritdoc}
	 */
	public function jsonSerialize()
	{

		return $this->title;
	}

	public function __toString()
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle( $title ) {
		$this->title = $title;
	}
}
