<?php
namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Session;
use Library\Router;
use Library\Password;
use Library\Cookie;
use Model\LoginForm;
use Model\RegisterForm;
use Model\User;
use Model\UserRepository;
class SecurityController extends Controller
{   
    public function loginAction(Request $request)
    {
        $form = new LoginForm($request);

        if ($request->isPost()) {
            if ($form->isValid()) {
                $password = new Password($form->password);
                $user = $this->get('repo_manager')->getRepository('User')->find($form->email, $password);
         
                if ($user) {
                    Cookie::set('user',$user->getEmail());
                    Session::setFlash('Signed in');
                    if ($user->getAdminRights() == 1)
                    {
                    Cookie::set('admin',1);                        
                    Router::redirect('/admin/books');
                    }
                    Router::redirect('/');
                }
        
                Session::setFlash('User not found');
                $this->get('router')->redirect('/login');
            }
            
            Session::setFlash('Fill the fields');
        }
        
        return $this->render('login.php', ['form' => $form]);
    }
    
    public function logoutAction(Request $request)
    {
        if (isset($_COOKIE['user'])) {
            Cookie::delete('user');
            if (isset($_COOKIE['admin']))
            {
               Cookie::delete('admin'); 
            }
            Session::setFlash('You have signed out');
            Router::redirect('/');
        }
        Router::redirect('/');
    }
    
    public function registerAction(Request $request)
    {
        $form = new RegisterForm($request);
        if ($request->isPost()) {
            if ($form->isValid()) {
                
                $password = new Password($form->password);
                $acivationCode = md5(uniqid());
                
                $user = (new User())
                    ->setEmail($form->email)
                    ->setPassword($password)
                ;
                if ($this->get('repo_manager')->getRepository('User')->check($user))
                {
                    Session::setFlash('Such user already exists!');
                    Router::redirect('/register');
                }
                $this->get('repo_manager')->getRepository('User')->save($user);
                Session::setFlash('Successfully registered!');
                $this->get('router')->redirect('/');
            }
            
            Session::setFlash('Fields filled incorrectly!');
        }     
        return $this->render('register.php', ['form' => $form]);
    }
}