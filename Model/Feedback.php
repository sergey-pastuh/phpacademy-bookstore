<?php
namespace Model;

class Feedback
{
	private $id;
	private $username;
	private $email;
	private $message;
	private $created;
	private $ipAdress;

	public function __construct()
	{
		$this->created = new \DateTime();
	}
	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	public function getMessage()
	{
		return $this->message;
	}

	public function setMessage($message)
	{
		$this->message = $message;
		return $this;
	}

	public function getCreated()
	{
		return $this->created;
	}

	public function setCreated(\DateTime $created)
	{
		$this->created = $created;
		return $this;
	}

	public function getIpAdress()
	{
		return $this->ipAdress;
	}

	public function setIpAdress($ipAdress)
	{
		$this->ipAdress = $ipAdress;
		return $this;
	}
	public function setDataFromForm(ContactForm $form)
	{
		foreach ($form as $property => $value) {
			$this->$property = $value;
		}

		return $this;
	}


}