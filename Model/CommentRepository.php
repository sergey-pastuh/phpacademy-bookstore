<?php
namespace Model;

use Library\EntityRepository;
class CommentRepository extends EntityRepository
{
	public function save(Comments $comment)
	{
		$sql = "
		INSERT INTO comments (book_id, username, message, date)
		values(:book_id, :username, :message, :date)
		";

		$pdo = $this->dbConnection->getPdo();
		$params = [
			'book_id' => $comment->getBookId(),
			'username' => $comment->getUsername(),
			'message' => $comment->getMessage(),
			'date' => $comment->getDate()
		];
		$sth = $pdo->prepare($sql);
		$sth->execute($params);

	}
	public function findAll($bookId)
	{
		$pdo = $this->dbConnection->getPdo();
		$sth = $pdo->query("SELECT * from comments WHERE book_id = '$bookId' ORDER BY date DESC ");

		$comments = [];

		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$comment = (new Comments())
				->setId($row['id'])
				->setBookId($row['book_id'])
				->setUsername($row['username'])
				->setMessage($row['message'])
				->setDate($row['date'])
			;
			// transform
			$comments[]=$comment;
		}

		return $comments;
	}
	public function delete($id)
	{
		$pdo = $this->dbConnection->getPdo();
		$sth = $pdo->prepare("DELETE FROM comments WHERE id = :id");
		$sth->execute(compact('id'));
	}
		public function edit($id)
	{
		$message = $_POST['edited_message'];
		$id = $_POST['comment_id'];
		$s = 1;
		$message2 = str_replace('\\', '\\\\', $message);
		$pdo = $this->dbConnection->getPdo();
		$sth = $pdo->prepare("UPDATE comments SET message = '$message2' WHERE id = $id");
		$sth->execute(compact('id'));
	}
}