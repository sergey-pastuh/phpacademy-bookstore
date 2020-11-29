<?php
namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Session;
use Library\Router;
use Model\BookRepository;
use Model\Book;
use Model\Feedback;
use Model\FeedbackRepository;
use Model\ContactForm;
class SiteController extends Controller
{
	public function indexAction(Request $request)
	{
		$cathegories = $this->get('repo_manager')->getRepository('Book')->find_all_cathegories();
		$books = [];
		$c = 1;
		foreach ($cathegories as $value) 
		{
			$books[$c] = $this->get('repo_manager')->getRepository('Book')->find_last_books($value);
			$c++;
		}
		
		return $this->render('index.php', array('books' => $books));
	}
	public function contactAction(Request $request)
	{
		$repo = $this->get('repo_manager')->getRepository('Feedback');
		$router = new Router('routes.php');
		$form = new ContactForm($request);
		if ($request->isPost()) 
		{
			if ($form->isValid())
			{
				$feedback = (new Feedback())->setDataFromForm($form)->setIpAdress($request->getIpAddress());

				$repo->save($feedback);
				Session::setFlash('Message sent!');
				$this->container->get('router');
				$router->redirect('/contact-us');
			}
			Session::setFlash('Form is invalid!');
		}

		return $this->render('contact.php', array('form' => $form));
	}	
}
?>
