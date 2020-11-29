<?php
namespace Library;

class Container
{
	private $elements = array();

	public function set($key, $value)
	{
		$this->elements['$key'] = $value;
	}

	public function get($key)
	{
		if(!isset($this->elements['$key'])){
			throw new \Exception("No such object with $key in container");
		}
		return $this->elements['$key'];
	}
}