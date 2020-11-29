<?php
namespace Model;

use Library\EntityRepository;
use Library\Session;
use Library\Router;
use Model\User;


class UserRepository extends EntityRepository
{
	public function find($username, $password)
    {	
		$pdo = $this->dbConnection->getPdo();
    
     	$sql = "
            SELECT * FROM user 
            WHERE email = :username 
            AND password = :hpass 
            ";
        $sth = $pdo->prepare($sql);
        $hpass = (string)$password;
        $sth->execute(compact('username', 'hpass'));
        $row = $sth->fetch(\PDO::FETCH_ASSOC);
        
        if (!$row) {
            return false;
        }
            
        return (new User())->setEmail($row['email'])->setAdminRights($row['Admin_rights']);
    }  
    public function check(User $user)
    { 
         $pdo = $this->dbConnection->getPdo();
            $sql = "
                    SELECT * FROM user 
                    WHERE email = ':email'
            ";
            
            $params = [
                'email' => $user->getEmail()
            ];
            $sth = $pdo->prepare($sql);
            $sth->execute($params);
            $a = $sth->fetch(\PDO::FETCH_ASSOC);
           
            return $a;
        
    }
    public function save(User $user)
    {
        $pdo = $this->dbConnection->getPdo();

        $sql = "
            INSERT INTO user (email, password)
            values (:email, :password)            
        ";
        
        
        $params = [
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ];
        $sth = $pdo->prepare($sql);
        $sth->execute($params);
    }
}