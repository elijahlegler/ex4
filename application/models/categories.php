<?php
class Categories extends Model{
	
	public function getCategories(){
		$sql = 'SELECT categoryID,name from categories';
		$categories2 = array();

		// perform query
		$results = $this->db->execute($sql);

		while ($row=$results->fetchrow()) {
			$categories[] = $row;
		}

		foreach($categories as $array){
			$categories2[$array['categoryID']]=$array['name'];
		}

		$categories = $categories2;
		return $categories;
	}
	
	public function getCategory($cID){
		$sql = 'SELECT categoryID, name FROM categories WHERE categoryID=?';
		$outcome = $this->db->getrow($sql,array($cID));

		return $outcome;
		
		}

	public function update($cID,$name){
		$categoryID = $this->db->qstr($cID);
		$categoryName = $this->db->qstr($name);

		$sql = "UPDATE categories SET name=$categoryName WHERE categoryID = $categoryID";
		$results = $this->db->execute($sql);

		return $results;
		}

	public function addCategory($category){
		$sql = "INSERT INTO categories (name) VALUES (?)";
		$outcome = $this->db->execute($sql, $category);

		return $outcome;
		}
		
}

?>