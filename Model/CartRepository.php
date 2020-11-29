<?php
namespace Model;

use Library\EntityRepository;
class CartRepository extends EntityRepository
{
	public function show($params)
	{
		$pdo = $this->dbConnection->getPdo();
        $sth = $pdo->query("SELECT * FROM book WHERE id IN ($params)");

        $books = [];

        while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
        	$book = (new Book())
				->setId($row['id'])
				->setTitle($row['title'])
				->setPrice($row['price'])
			;
		$books[]=$book;
        }
        return $books;
	}
	public function order()
	{
		$pdo = $this->dbConnection->getPdo();
		$bookList = (string)implode('B', unserialize($_COOKIE['books']));
		$user = $_COOKIE['user'];
        $pdo->query("INSERT INTO cart_orders (`orders`, `user`) VALUES ('$bookList', '$user')");
	}	
	public function show_orders()
	{
		$pdo = $this->dbConnection->getPdo();
        $sth = $pdo->query("SELECT * FROM cart_orders");

        $orders = [];

        while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
        	$order = (new Cart())
        		->setId($row['id'])
				->setUser($row['user'])
				->setList($row['orders'])
				->setAccepted($row['accepted_by_admin'])
			;	

		$orders[]=$order;
        }
        return $orders;
	}
	public function show_books_by_id($id)
	{
		$pdo = $this->dbConnection->getPdo();
        $sth = $pdo->query("SELECT `orders` FROM cart_orders WHERE `id` = $id");

        $rawOrder = $sth->fetch(\PDO::FETCH_ASSOC);

        $order = str_replace('B', ',', $rawOrder['orders']);

		$sth = $pdo->query("SELECT * from book WHERE id IN ($order)");

		$books = [];

		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$book = (new Book())
				->setId($row['id'])
				->setTitle($row['title'])
				->setDescription($row['description'])
				->setPrice($row['price']
			);
			// transform
			$books[]=$book;
		}

		return $books;
	}
	public function order_list($id)
	{
		$pdo = $this->dbConnection->getPdo();
        $sth = $pdo->query("SELECT `orders` FROM cart_orders WHERE `id` = $id");
        return $rawOrder = $sth->fetch(\PDO::FETCH_ASSOC);
	}	
	public function delete_order($id)
	{
		$pdo = $this->dbConnection->getPdo();
        $sth = $pdo->query("DELETE FROM `cart_orders` WHERE id = $id");
	}
	public function accept_order($id)
	{
		$pdo = $this->dbConnection->getPdo();
        $sth = $pdo->query("UPDATE `cart_orders` SET `accepted_by_admin`= 1 WHERE id = $id");
	}	
}