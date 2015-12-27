<?
header ("Content-Type: text/html;charset=UTF-8");

require_once(config.php);
require_once(classes/ACore.php);

if ($_GET['option']) {
	$class = trim(strip_tags($_GET['option']));
}
else {
	$class = 'main';
}

if(file_exist("classes/".$class.".php")) {
	
	include("classes/".$class.".php");
	if(class_exist($class)) {
		$obj = new $class;
		$obj -> get_body();
	}
	else {
		exit("Нет данных для входа");
	}
}
else {
	exit("Не правильный адрес");
}
?>