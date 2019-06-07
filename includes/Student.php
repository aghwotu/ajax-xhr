<?php 
	include_once __DIR__.'/../config/Database.php';
	class Student extends Database {

		public function readStudentsAndCenters() {
			$query = 'SELECT candidates_id, candidates_names, centre_name , category_names 
						FROM tbcandidates 
						LEFT OUTER JOIN tbcentres ON tbcandidates.centre_id = tbcentres.centre_id 
						LEFT OUTER JOIN tbcategories ON tbcandidates.category_id = tbcategories.categories_id';
			$result = $this->connect()->query($query);
			$num_rows = $result->num_rows;
			$student_arr = array();
			if($num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
				    $student_arr[] = $row;
				}
				return $student_arr;
			}
		}

		public function readCategories($categ_name) {
			$query = "SELECT candidates_id, candidates_names, centre_name , category_names 
						FROM tbcandidates 
						LEFT OUTER JOIN tbcentres ON tbcandidates.centre_id = tbcentres.centre_id 
						LEFT OUTER JOIN tbcategories ON tbcandidates.category_id = tbcategories.categories_id
						WHERE category_names = '".$categ_name."'";
			$result = $this->connect()->query($query);
			$num_rows = $result->num_rows;
			$student_arr = array();
			if($num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$student_arr[] = $row;
				}
				return $student_arr;
			}
		}

	}

?>