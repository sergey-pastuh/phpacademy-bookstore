<?php
namespace Model;

use Library\Cookie;

class Cart
{
    /**
     * Products array
     *
     * @var array|mixed
     */
    private $products;
    private $id;
    private $user;
    private $list;
    private $accepted_by_admin;


    /**
     *  Constructor
     */
    function __construct()
    {
        $a = Cookie::get('books');
        $this->products = $a == null ?
            array()
            :
            unserialize(Cookie::get('books'));
    }


    /**
     * products getter
     *
     * @return mixed
     */
    public function getProducts($for_sql = false)
    {
        if ($for_sql) {
            return implode(',', $this->products);
        }

        return $this->products;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }    
    public function getList()
    {
        return $this->list;
    }

    public function setList($list)
    {
        $this->list = $list;
        return $this;
    }
    public function getAccepted()
    {
        return $this->accepted_by_admin;
    }

    public function setAccepted($accepted_by_admin)
    {
        $this->accepted_by_admin = $accepted_by_admin;
        return $this;
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
    /**
     * adding product
     *
     * @param $id
     */
    public function addProduct($id)
    {
        $id = (int)$id;

        array_push($this->products, $id);

        Cookie::set('books', serialize($this->products));
    }


    /**
     * deleting product
     *
     * @param $id
     */
    public function deleteProduct($id)
    {
        $id = (int)$id;

        $key = array_search($id, $this->products);
        if ($key !== false){
            unset($this->products[$key]);
        }

        Cookie::set('books', serialize($this->products));
    }


    /**
     *  clear cart
     */
    public function clear()
    {
        Cookie::delete('books');
    }



    /**
     * check if empty
     *
     * @return bool
     */
    public function isEmpty()
    {
        return !$this->products;
    }
}