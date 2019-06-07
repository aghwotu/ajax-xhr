<?php 

	include_once __DIR__ .'/../../includes/Student.php';

	$student = new Student();
	$student_all = $student->readStudentsAndCenters();

	// var_dump($student_all);

	echo json_encode($student_all);
?>