<?php
namespace Library;
class Request
{
    const METHOD_POST = 'POST';
    
    private $get = array();
    private $post = array();
    private $server = array();
    
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
    }
    
    /**
    * @return string|null
    */
    public function post($key)
    {
    	return isset($this->post[$key]) ? $this->post[$key] : null;
    }
    
    /**
    * @return string|null
    */
    public function get($key)
    {
    	return isset($this->get[$key]) ? $this->get[$key] : null;
    }
        public function server($key)
    {
        return isset($this->server[$key]) ? $this->server[$key] : null;
    }
    public function getDefault($key, $key2)
    {
        return isset($this->get[$key]) ? $this->get[$key] : $this->get[$key2]=$key2;
    }    
    
    public function getMethod()
    {
        return strtoupper($this->server['REQUEST_METHOD']);
    }
    
    public function getIpAddress()
    {
        return $this->server['REMOTE_ADDR'];
    }
    
    /**
    * @return bool 
    */
    public function isPost()
    {
    	return $this->getMethod() == self::METHOD_POST;
    }
         /**
     * @param array $params
     */
    public function mergeGet(array $params)
    {
        $this->get += $params;
        $_GET += $params;
    }
        /**
     * @return string
     */
    public function getURI()
    {
        $uri = $this->server('REQUEST_URI'); // $_SERVER['REQUEST_URI']
        $uri = explode('?', $uri);
        return $uri[0];
    }
}