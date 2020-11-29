<?php
namespace Model;

use Library\EntityRepository;

class FeedbackRepository extends EntityRepository
{
	public function save(Feedback $feedback)
	{
		$sql = "
		INSERT INTO feedback (username, email, message, created, ip_adress)
		values(:username, :email, :message, :created, :ip_adress)
		";

		$pdo = $this->dbConnection->getPdo();
		$params = [
			'username' => $feedback->getUsername(),
			'email' => $feedback->getEmail(),
			'message' => $feedback->getMessage(),
			'created' => $feedback->getCreated()->format('Y-m-d H-i-s'),
			'ip_adress' => $feedback->getIpAdress(),
		];
		$sth = $pdo->prepare($sql);
		$sth->execute($params);

	}
	public function show()
	{
		$pdo = $this->dbConnection->getPdo();
		$sth = $pdo->query("SELECT `id`, `username`,`message`,`created` FROM `feedback`");

		$feedbacks = [];

		while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$feedback = (new Feedback())
				->setId($row['id'])
				->setUsername($row['username'])
				->setMessage($row['message'])
			;
			// transform
			$feedbacks[]=$feedback;
		}

		return $feedbacks;

	}
	public function showById($id)
	{
		$pdo = $this->dbConnection->getPdo();
		$sql = "SELECT `id`, `username`,`message`,`created` FROM `feedback` WHERE `id` = :id";

		$params = ['id' => $id];

		$sth = $pdo->prepare($sql);
		$sth->execute($params);
		$feedback = $sth->fetch(\PDO::FETCH_ASSOC);
		return $feedback;
	}		
}