<?php
namespace Model;

use Library\Request;
class Comments
{
    private $id;
    private $bookId;
    private $username;
    private $message;
    private $date;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }   
    public function getBookId()
    {
        return $this->bookId;
    }

    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
        
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

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        
        return $this;
    }
    
    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        
        return $this;
    }
    public function setDataFromForm($form, $bookId)
    {
            foreach ($form as $property => $value) {
            $this->$property = $value;
        }
        $this->setBookId($bookId)
             ->setUsername($_COOKIE['user'])
             ->setDate(date('Y-m-d H:i:s'))
       ;
        return $this;
    }           
}