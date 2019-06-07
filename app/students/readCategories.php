<?php 
	include_once __DIR__.'/../../includes/Student.php';

	$category = '';
	$category = rtrim(ltrim($_POST['category']));

	$student = new Student();
	$student_categ = $student->readCategories($category);

	echo json_encode($category);


?>