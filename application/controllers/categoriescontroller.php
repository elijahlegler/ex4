<?php
class CategoriesController extends Controller{
	
	protected $categoryObject;

	public function getCategories(){
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->getCategories();
		}
		
	public function edit($cID){
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->getCategory($cID);

		$this->set('category', $outcome);
	}

	public function update(){
		$cID = $_POST['categoryID'];
		$name = $_POST['categoryname'];
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->update($cID,$name);

		if($outcome){
			$this->set('message','Category updated.');
		}
		else{
			$this->set('message','Category update failed.');
		}
		$outcome = $this->categoryObject->getCategories();
		$this->set('categories',$outcome);
	}

	public function add(){
		$new = $_POST['category'];
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->addCategory($new);

		if(isset($outcome) and !empty($outcome)){
			$this->set('message','Category added.');
		}
		else{
			$this->set('message','Category add failed.');
		}
		
		$outcome = $this->categoryObject->getCategories();
		$this->set('categories',$outcome);
	}

}
?>