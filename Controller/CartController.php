<?php
namespace Controller;
use Library\Controller;
use Library\Request;
use Library\Router;
use Library\Session;
use Model\Cart;
use Model\Book;
use Library\Cookie;

class CartController extends Controller
{

	public function addAction(Request $request)
	{
		$router = new Router('routes.php');
		$cart = new Cart();
		$id = $request->get('id');
		$cart->addProduct($id);
		Session::setFlash('The book was successfully added!');
		$router->redirect("/books");
	}

	public function showAction(Request $request)
	{
		$cart = new Cart();
		$router = new Router('routes.php');
		$repo = $this->get('repo_manager')->getRepository('Cart');	
		$id_sql = $cart->getProducts(true);
		if (!$id_sql == '')	
		$books = $repo->show($id_sql);
		return @$this->render('show.php', array('books' => $books));
	}
		public function amountMinusAction(Request $request)
	{
		$id = $request->get('id');
		$router = new Router('routes.php');
		$books = unserialize($_COOKIE['books']);
		foreach ($books as $key => $book) 
		{
			if ($book == $id)
			{	
				unset($books[$key]);
				break;
			}	
		}
		Cookie::set('books', serialize($books));
		$router->redirect("/cart");		
	}
		public function amountPlusAction(Request $request)
	{
		$id = $request->get('id');
		$router = new Router('routes.php');
		$books = unserialize($_COOKIE['books']);		
		array_push($books, $id);
		Cookie::set('books', serialize($books));
		$router->redirect("/cart");		
	}		
		public function bookDeleteAction(Request $request)
	{
		$router = new Router('routes.php');
		$cart = new Cart();
		$id = $request->get('id');
		$list = unserialize($_COOKIE['books']);
		foreach ($list as $key => $value) {
			if ($value == $id)
			{
				unset($list[$key]);
			}
		}
        Cookie::set('books',serialize($list));     
		$router->redirect("/cart");
	}
		public function deleteAction(Request $request)
	{
		$cart = new Cart();
		$router = new Router('routes.php');
		$cart->clear();
		Session::setFlash('Your cart was cleared.');
		$router->redirect("/cart");		
	}
		public function orderAction(Request $request)
	{
		$router = new Router('routes.php');
		$repo = $this->get('repo_manager')->getRepository('Cart');
		$repo->order();
		Cookie::delete('books');
		Session::setFlash('Your order has been sent!');
		$router->redirect("/cart");		
	}
	
}