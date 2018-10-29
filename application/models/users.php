<?php
class users extends Model{
	public $uID;
	public $first_name;
	public $last_name;
	public $email;
	protected $user_type;
	// Constructor
	public function __construct(){
		parent::__construct();
		//test inputs
		$this->uID = 22;
		$this->first_name = 'Bill';
		$this->last_name = 'Murray';
		$this->email = 'bmurray@gmail.com';
		$this->user_type = 1;
	}
}

	public function getUser($uID){
		$sql = 'SELECT uID, first_name, last_name, email, password FROM users WHERE uID = ?';

		// perform query
		$results = $this->db->getrow($sql, array($uID));
		$user = $results;
		return $user;
	}

	public function getAllusers($limit = 0){
		if($limit > 0){
			$numusers = ' LIMIT '.$limit;
		}
		$sql = 'SELECT uID, first_name, last_name, email, password FROM users'.$numusers;

		// perform query
		$results = $this->db->execute($sql);

		while ($row=$results->fetchrow()) {
			$users[] = $row;
		}

		return $users;
	}

	//Correct addUser method

	public function addUser($data){
		$sql = 'INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?)';
		$this->db->execute($sql,$data);
		$message = 'User added.';
		return $message;
	}

	public function isRegistered() {
		if(isset($this->user_type)) {
			return true;
		}
		else {
			return false;
		}
	}

	public function isAdmin() {
		if($this->user_type == '1') {
			return true;
		}
		else {
			return false;
		}
	}

	public function checkUser($email, $password) {
		$sql = 'SELECT email, password FROM users WHERE email = ?';

		$results = $this->db->getrow($sql, array($email));
		$user = $results;

		$password_db = password_hash($password, PASSWORD_DEFAULT);

		if (password_verify($password, $password_db)) {
			return true;
		}
		else {
			return false;
		}
	}

		public function getUserFromEmail($email) {
			$sql = 'SELECT * FROM users WHERE email = ?';

			$results = $this->db->getrow($sql, array($email));

			$user = $results;

			return $user;
		}

		public function getUserName(){
			return $this->first_name. ' ' .$this->last_name;
		}

		public function getEmail() {
			return $this->email;
		}

		public function getUserFromID($uID) {
			$sql = 'SELECT * FROM users WHERE uID = ?';

			$results = $this->db->getrow($sql, array($uID));

			$user = $results;

			return $user;
		}


}
