<?php

class RegisterController extends Controller{

	protected $userObject;

	public function defaultTask(){
		$userObject = new users();
		$this->set('task','add');
	}

	public function add(){
		$this->userObject = new users();
		$password = $_POST['password'];
		$passhash = password_hash($password, PASSWORD_DEFAULT);
		$data = array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'email'=>$_POST['email'],'password'=>$passhash);

		$this->userObject->addUser($data);
		$this->set('message', 'Thanks for registering!');
	}

	public function edit($uID){

			$this->userObject = new User();

			$user = $this->userObject->getUser($uID);

			$this->set('uID', $user['uID']);
			$this->set('fname', $user['fname']);
			$this->set('lname', $user['lname']);
			$this->set('email', $user['email']);
			$this->set('password', $user['password']);
			$this->set('task', 'update');


	}

}

?>
