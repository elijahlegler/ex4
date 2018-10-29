<?php

class Controller {
   	public $load;
	public $data = array();

	function __construct($view, $method = null, $parameters = null){
		//instantiate the load class
		$this->load = new Load();
		new Model();
			
		//run any task methods
		if($method){
			$this->runTask($method, $parameters);
		}else{
			$this->defaultTask();
		}
			
		//render the view
		$this->load->view($view.'.php', $this->data);
	}
	
	/*
	*The runTask() method is our way of grabbing the method from the URI string and parsing the parameters
	*/
	public function runTask($method, $parameters = null){
		
		if($method && method_exists($this, $method)) {
			 		
					//the call_user_func_array expects an array so we create a null array if parameters is empty
					if(!is_array($parameters)){
						$parameters = array();
					}
		
          call_user_func_array(array($this, $method), $parameters); 
		  
     	}
	
	}
	
	/*
	*The defaultTask() method is the one run if no task method is run. Here as a placeholder for child classes.
	*/
	public function defaultTask(){
	
	}
	
	
	/*
	*The set() method allows us to more easily set the view variables
	*/
	public function set($key, $value){
		
		$this->data[$key] = $value;
		
	}



}
