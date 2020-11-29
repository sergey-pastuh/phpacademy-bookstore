<?php
namespace Model;

class Book
{	
	private $id;
	private $img;
	private $title;
	private $description;
	private $price;
	private $cathegory;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setPrice($price)
	{
		$this->price = $price;
		return $this;
	}

	public function getStyle()
	{
		return $this->style;
	}

	public function setStyle($style)
	{
		$this->style = $style;
		return $this;
	}
	public function getAuthors()
	{

	}
	public function setAuthors(array $authors)
	{
		$this->authors = $authors;

		return $this;
	}
	public function setDataFromForm(BookForm $form)
	{
		foreach ($form as $property => $value) {
			$this->$property = $value;
		}

		return $this;
	}
	public function getImage()
	{
		return $this->img;
	}
	public function setImage($img)
	{
		$this->img = $img;
		return $this;
	}
	public function getCathegory()
	{
		return $this->cathegory;
	}
	public function setCathegory($cathegory)
	{
		$this->cathegory = $cathegory;
		return $this;
	}	
	public function __toString()
	{
		return "{$this->title} {$this->price}";
	}
}