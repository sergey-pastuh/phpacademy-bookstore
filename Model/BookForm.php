<?php
namespace Model;

use Library\Request;
class BookForm
{
    public $img;
    public $title;
    public $description;
    public $price;
    public $cathegory;
    
    public function __construct(Request $request)
    {
        $this->title = $request->post('title');
        $this->description = $request->post('description');
        $this->price = $request->post('price');
        $this->cathegory = $request->post('cathegory');
    }
    
    public function isValid()
    {
        return $this->title != '' && $this->description != '' && $this->price != '' && $this->cathegory != '' && $this->price >= 0 && strlen($this->title) <= 100 && strlen($this->description) <= 2000;
    }
}