<?php
header ("Content-Type: text/html;charset=UTF-8");
 
include_once ("config.php") ;
include_once ("classes/ACore.class"); 

 if (isset($_GET['option'])) {
	$class = trim(strip_tags($_GET['option']));
	} else {
	$class = 'main';
}
if(file_exists("classes/".$class.".class")) {
	
	include("classes/".$class.".class");
	if(class_exists($class)) {
		
		$obj = new $class;
		$obj -> get_body();
		
	} else {
		exit("Нет данных для входа");
	}
} else {
	exit("Не правильный адрес");
} 
?>