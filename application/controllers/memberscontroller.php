<?php

class MembersController extends Controller{
	
	public $userObject;
  
   	public function view($uID){
		$this->userObject = new users();
		$user = $this->userObject->getUser($uID);	    
	  	$this->set('user',$user);
   	}
	
	public function defaultTask(){
		$this->userObject = new users();
		$users = $this->userObject->getAllusers();
		$this->set('title', 'The Members View');
		$this->set('users',$users);
		$this->set('first_name',$first_name);
		$this->set('last_name',$last_name);
		$this->set('email',$email);
	}
	
}

?>