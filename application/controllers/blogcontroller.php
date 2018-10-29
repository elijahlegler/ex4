<?php

class BlogController extends Controller{
	
	public $postObject;
  
   	public function view($pID){
		$this->postObject = new Post();
		$post = $this->postObject->getPost($pID);	    
	  	$this->set('post',$post);
   	}
	
	public function defaultTask(){
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'The Default Blog View');
		$this->set('posts',$posts);
	}
	
}

?>