<?php
namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Router;
use Model\BookRepository;
use Model\Book;
use Model\CommentForm;
use Model\Comments;
use Library\DbConnection;

class BookController extends Controller
{
	public function indexAction(Request $request)
	{
		$this->get('repo_manager');
		$books = $this->get('repo_manager')->getRepository('Book')->findAll();
		$params = array(
				'books' => $books
			);
		return $this->render('index.php', array('books' => $books));
	}
	public function showAction(Request $request)
	{
		$router = new Router('routes.php');
		$repo = $this->get('repo_manager')->getRepository('Comment');
		$id = $request->get('id');
		$_SESSION['curpage']=$id;
		$form = new CommentForm($request);
		if ($request->isPost())
		{
			if ($form->isValid())
			{
				$comment = (new Comments())->setDataFromForm($form, $request->get('id'));
				$repo->save($comment);
				$this->container->get('router');
				$router->redirect("/book-{$id}.html");
			}
		}
		$book = $this->get('repo_manager')->getRepository('Book')->find($id);
		$comments = $this->get('repo_manager')->getRepository('Comment')->findAll($id);
		$args = ['book' => $book,'comments' => $comments];

		return $this->render('show.php', $args);
	}
	
	public function ajaxAction(Request $request)
	{
		global $dbConnection;
		$message = $_POST[1];
		$id = $_POST[2];
		$message2 = str_replace('\\', '\\\\', $message);
		$pdo = $dbConnection->getPdo();
		$sth = $pdo->query("UPDATE comments SET message = '$message2' WHERE id = '$id'");
	}
}
?>
