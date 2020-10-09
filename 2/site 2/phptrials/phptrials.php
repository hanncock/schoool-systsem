<?php 
	echo "welcome"."<br>";
	print "welcome2"."<br>";
	$y ="hello world";
	echo $y."<br>";
	var_dump($y)."<br>";
	class Car{
		function Car(){
			$this -> model = "VW";
		}
	}
	
	$herbie = new Car();
	echo $herbie -> model;
?>