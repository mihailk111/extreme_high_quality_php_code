<?php

class Db_wrapper //TODO TRY CATCHES ON REQUESTS TO DB	
{
	public function __construct($host, $db_name, $login, $pass)
	{
		
		$this->connection = new PDO ("mysql:host={$host};dbname={$db_name}", $login, $pass);
	
	}

	public function get_user($login) // return array || false
	{
		
		$login = $this->W_filter($login);		// remove non symbols
		
		
		$req = $this->connection->prepare('SELECT * FROM users WHERE login = :login');
		$req->execute(['login' => $login]);
		$user_data = $req->fetchAll(PDO::FETCH_ASSOC);
		
		return $user_data;
	}
	
	

	public function create_user($login, $password) 
	{
		$req = $this->connection->prepare('INSERT INTO users (id,login,password_hash) VALUES (NULL, :login, :password)');
		$req->execute(['login'=>$login, 'password'=>$password]);
		

	}
	public function get_all_cards()
	{
		$req = $this->connection->prepare("SELECT cards.id, cards.title, cards.content, cards.link,cards.user_id, users.login as user_login FROM cards JOIN users ON cards.user_id = users.id");
		$req->execute();
		$cards = $req->fetchAll(PDO::FETCH_ASSOC);
		return $cards;

	}
	
	private function W_filter($login)
	{
		return preg_replace('/\W/', '', $login);
	}
	
	private $connection;
	private $state;
	
	public function get_error()
	{
		vardump($this->connection->errorInfo());
	}
}

?>