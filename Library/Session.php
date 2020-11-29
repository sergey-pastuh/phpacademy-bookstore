<?php

namespace Library;

abstract class Session
{
	public static function start()
	{
		session_start();
	}
	public static function get($key)
	{
		if(self::has($key)){
			return $_SESSION['$key'];
		}
		return null;
	}
	public static function set($key, $value)
	{
		$_SESSION['$key'] = $value;
	}
	public static function remove($key)
	{
		if(self::has($key)) {
			unset($_SESSION['$key']);
		}
	}
	public static function has($key)
	{
		return isset($_SESSION['$key']);
	}
	public static function setFlash($message)
	{
		self::set('flash_msg' , $message);
	}
	public static function getFlash()
	{
		$message = self::get('flash_msg');
		self::remove('flash_msg');
		return $message;
	}
}