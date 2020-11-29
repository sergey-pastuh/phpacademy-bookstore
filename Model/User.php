<?php
namespace Model;

class User
{
    private $id;
    private $email;
    private $password;
    private $adminRights;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param mixed $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @param mixed $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        
        return $this;
    }
    public function getAdminRights()
    {
        return $this->adminRights;
    }
    /**
     * @param mixed $password
     * @return $this
     */
    public function setAdminRights($adminRights)
    {
        $this->adminRights = $adminRights;
        
        return $this;
    }
}