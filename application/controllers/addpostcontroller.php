<?php

class AddPostController extends Controller{
	
	public $postObject;
	
	public function defaultTask(){
		$this->postObject = new Post();
		$this->getCategories();
		$this->set('task', 'add');
	}
	
	public function add(){
		$this->postObject = new Post();
		$data = array('title'=>$_POST['title'],'content'=>$_POST['content'],'category'=>$_POST['category'],'date'=>$_POST['date']);
		//$this->getCategories();
			
		$result = $this->postObject->addPost($data);
		$this->set('message', $result);
	}
	
	public function edit($pID){
		$this->postObject = new Post();
		$post = $this->postObject->getPost($pID);
		$this->getCategories();
			
		$this->set('pID', $post['pID']);
		$this->set('title', $post['title']);
		$this->set('content', $post['content']);
		$this->set('date', $post['date']);
		$this->set('category', $post['categoryID']);
		$this->set('task', 'update');
	}
	
	public function getCategories(){
		$this->postObject = new Categories();
		$categories = $this->postObject->getCategories();
		$this->set('categories',$categories);
	}
	
	public function update(){
		$data = array('title'=>$_POST['title'],'content'=>$_POST['content'],'category'=>$_POST['category'],'date'=>$_POST['date'],'pID'=>$_POST['pID']);

		$this->postObject = new Post();
		
		$result = $this->postObject->updatePost($data);
		$outcome = $this->postObject->getAllPosts();
		$this->set('posts',$outcome);
		$this->set('message', $result);
		$this->getCategories();
		$this->set('task', 'update');
	}
	
}
