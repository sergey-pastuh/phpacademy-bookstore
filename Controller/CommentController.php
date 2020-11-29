<?php
namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Router;
use Model\BookRepository;
use Model\Book;
use Model\CommentForm;
use Model\Comments;

class CommentController extends Controller
{
	public function deleteAction(Request $request)
	{
		$prevpage = $_SESSION['curpage'];
		$router = new Router('routes.php');
		$this->get('repo_manager')->getRepository('Comment')->delete($request->get('id'));		
		$router->redirect("/book-{$prevpage}.html");	
	}
	public function editAction(Request $request)
	{
		$prevpage = $_SESSION['curpage'];
		$router = new Router('routes.php');
		$this->get('repo_manager')->getRepository('Comment')->edit($request->get('id'));		
		$router->redirect("/book-{$prevpage}.html");	
	}
}
?>
