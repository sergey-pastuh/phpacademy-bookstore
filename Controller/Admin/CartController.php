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
class CartController extends Controller
{
	public function indexAction(Request $request)
	{
		$router = new Router('routes.php');
		
		if (!isset($_COOKIE['admin']))
		{
			$router->redirect('/');
		}	
		$orders = $this->get('repo_manager')->getRepository('Cart')->show_orders();

		return $this->render('orders.php', array('orders' => $orders));
	}
	public function showAction(Request $request)
	{
		$router = new Router('routes.php');
		
		if (!isset($_COOKIE['admin']))
		{
			$router->redirect('/');
		}
		$id = $request->get('id');	
		$books = $this->get('repo_manager')->getRepository('Cart')->show_books_by_id($id);
		$list = $this->get('repo_manager')->getRepository('Cart')->order_list($id);
		
		return $this->render('show.php', array('books' => $books, 'list' => $list));
	}
	public function deleteAction(Request $request)
	{
		$router = new Router('routes.php');
		
		if (!isset($_COOKIE['admin']))
		{
			$router->redirect('/');
		}
		$id = $request->get('id');	
		$this->get('repo_manager')->getRepository('Cart')->delete_order($id);
		$router->redirect('/admin/cart-order-list');
	}
	public function acceptAction(Request $request)
	{
		$router = new Router('routes.php');
		
		if (!isset($_COOKIE['admin']))
		{
			$router->redirect('/');
		}
		$id = $request->get('id');	
		$this->get('repo_manager')->getRepository('Cart')->accept_order($id);
		$router->redirect('/admin/cart-order-list');
	}		
}