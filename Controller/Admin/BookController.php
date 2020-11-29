<?php
namespace Controller\Admin;

use Library\Controller;
use Model\BookRepository;
use Library\Request;
use Library\Router;
use Model\BookForm;
use Model\Book;
use Library\Session;
use Library\ImageUploader;
class BookController extends Controller
{
	public function indexAction(Request $request)
	{
		$router = new Router('routes.php');
		
		if (!isset($_COOKIE['admin']))
		{
			$router->redirect('/');
		}	
		$this->get('repo_manager');
		$books = $this->get('repo_manager')->getRepository('Book')->findAll();

		return $this->render('index.php', array('books' => $books));
	}
	public function saveAction(Request $request)
	{
		$router = new Router('routes.php');	
		
		if (!isset($_COOKIE['admin']))
		{
			$router->redirect('/');
		}	
		$repo = $this->get('repo_manager')->getRepository('Book');
		$form = new BookForm($request);
		if ($request->isPost()) 
		{
			if ($form->isValid())
			{	
				$result = ImageUploader::upload_file($_FILES['imgfile']);
				 $img = 'null'; // В таблице поле должно иметь значение по умолчанию null
				 if (isset($result['error'])){
				   $error = $result['error'];
					 }else{
					  $img = $result['filename'];
				  }
				 if (!isset($error)){
					 $book = (new Book())->setDataFromForm($form)->setImage($img);
					 $repo->save($book);
					 Session::setFlash('Book Saved!');
					 $this->container->get('router');
					 $router->redirect('/admin/books');
				 	} else { 				 	
					  	Session::setFlash($error);
				  }				
			}
			Session::setFlash('Form is invalid!');
		}		
		return $this->render('book_add.php', array('form' => $form));
	}
	public function deleteAction(Request $request)
	{
		if (!isset($_COOKIE['admin']))
		{
			$router->redirect('/');
		}
		$router = new Router('routes.php');
		$this->get('repo_manager')->getRepository('Book')->delete($request->get('id'));		
		$router->redirect("/admin/books");	
	}
}