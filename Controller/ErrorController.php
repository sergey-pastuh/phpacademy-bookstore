<?php
namespace Controller;

use Library\Request;
use Library\Controller;

class ErrorController extends Controller
{
	private $exception;

	public function __construct(\Exception $e)
	{
		$this->exception = $e;
	}

	public function errorAction(Request $request)
	{
		return $this->render('error.php', ['message' => $this->exception->getMessage()]);
	}
}

