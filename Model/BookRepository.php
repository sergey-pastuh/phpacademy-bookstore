<?php
namespace Model;

use Library\EntityRepository;
class BookRepository extends EntityRepository
{
	public function save(Book $book)
	{
		$pdo = $this->dbConnection->getPdo();
		$sql = "
		INSERT INTO book (title, description, price, img, cathegory)
		values(:title, :description, :price, :img, :cathegory)
		";

		$params = [
			'title' => $book->getTitle(),
			'price' => $book->getPrice(),
			'description' => $book->getDescription(),
			'img' => $book->getImage(),
			'cathegory' => $book->getCathegory()
		];
		$sth = $pdo->prepare($sql);
		$sth->execute($params);

	}
	public function findAll()
	{
		$pdo = $this->dbConnection->getPdo();
		$sth = $pdo->query("SELECT * from book ORDER BY price");

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
	public function find($id)
	{
		$pdo = $this->dbConnection->getPdo();
		$sth = $pdo->prepare("SELECT * FROM book WHERE id = :id");
		$sth->execute(compact('id'));

		$row = $sth->fetch(\PDO::FETCH_ASSOC);
		return (new Book())
				->setId($row['id'])
				->setTitle($row['title'])
				->setDescription($row['description'])
				->setPrice($row['price'])
				->setImage($row['img'])
		;		
	}
	public function delete($id)
	{
		$pdo = $this->dbConnection->getPdo();
		$sth = $pdo->prepare("DELETE FROM book WHERE id = :id");
		$sth->execute(compact('id'));
	}
	public function find_all_cathegories()
	{
		$cathegories = [];
		$c = 1;
		$pdo = $this->dbConnection->getPdo();
		$sth = $pdo->query("SELECT DISTINCT cathegory from book");
		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
		$cathegories["$c"] = $row['cathegory'];
		$c++;
	}
	return $cathegories;
	}	
	public function find_last_books($cath)
	{
		$pdo = $this->dbConnection->getPdo();
		$sth = $pdo->query("SELECT * from book WHERE cathegory = '$cath' LIMIT 5");

		$books = [];

		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$book = (new Book())
				->setId($row['id'])
				->setTitle($row['title'])
				->setPrice($row['price'])
				->setCathegory($row['cathegory'])	
			;
			$books[]=$book;
		}
		return $books;
	}
}