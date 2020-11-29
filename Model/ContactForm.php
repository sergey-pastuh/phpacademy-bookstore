<?php
namespace Model;
use Library\Request;
class ContactForm
{
    public $username;
    public $email;
    public $message;
    
    public function __construct(Request $request)
    {
        $this->username = $request->post('username');
        $this->email = $request->post('email');
        $this->message = $request->post('message');
    }
    
    public function isValid()
    {
        return $this->username != '' && $this->email != '' && $this->message != '';
    }
    
    public function checkbox($value)
    {
        return $value === 'on';
    }
    
    public function checkboxChecked()
    {
        return $this->publishEmail ? "checked='checked'" : '';
    }
}