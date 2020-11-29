<?php
namespace Model;

use Library\Request;

class RegisterForm
{
    public $email;
    public $password;
    public $passwordRepeat;
    
    public function __construct(Request $request)
    {
        $this->email = $request->post('email');
        $this->password = $request->post('password');
        $this->passwordRepeat = $request->post('passwordRepeat');
    }
    
    public function isValid()
    {
        $passwordsMatch = $this->password == $this->passwordRepeat;
        return $this->password != '' && $this->email != '' && $passwordsMatch;
    }
}