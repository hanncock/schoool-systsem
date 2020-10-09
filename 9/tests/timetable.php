<?php 
	$teachers = array('soke','hanno','oho');
	$subjects = array('math','english','swahili');
	$classes = array('form1','form2','form3','form4');
	$teachersubject = array();
	array_push($teachersubject,$teachers,$subjects);
	//print_r($teachersubject);
	//echo $teachersubject[0][0][0];
	$teaching =$teachers[0].$subjects[0].$subjects[1];
	//print_r ($teaching);
	//$time = date('h:i:sa');
	//echo date("h:i:sa")+'1';
	$date = date_create('2019-01-01');
	echo date_format($date, 'h:i:sa');

?>