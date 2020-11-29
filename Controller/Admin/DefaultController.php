<?php
namespace Controller\Admin;

use Library\Controller;
use Library\Request;
use Library\Router;
class DefaultController extends Controller
{
	public function indexAction(Request $request)
	{
		$router = new Router('routes.php');

		if (!isset($_COOKIE['admin']))
		{
			$router->redirect('/');
		}

		return $this->render('index.php');
	}
	public function contactAction(Request $request)
	{
		$router = new Router('routes.php');
		
		if (!isset($_COOKIE['admin']))
		{
			$router->redirect('/');
		}	
		$feedbacks = $this->get('repo_manager')->getRepository('Feedback')->show();
		
		return $this->render('feedbacks.php', array('feedbacks' => $feedbacks));
	}
	public function showAction(Request $request)
	{
		$router = new Router('routes.php');
		
		if (!isset($_COOKIE['admin']))
		{
			$router->redirect('/');
		}
		$id = $request->get('id');	
		$feedback = $this->get('repo_manager')->getRepository('Feedback')->showById($id);
		return $this->render('show.php', array('feedback' => $feedback));
	}		
}