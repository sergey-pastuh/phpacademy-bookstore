<?php
namespace Model;

use Library\Request;
class CommentForm
{

    public $message;
    
    public function __construct(Request $request)
    {
        $this->message = $request->post('comment');
    }
    
    public function isValid()
    {
        return $this->message != '';
    }
    
}