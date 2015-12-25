<?php
include "dbLib.php";

$res = $connection->prepare("INSERT INTO vacansy 
												(name,
												zarplata_ot,
												zarplata_do,
												id_exp,
												id_edu,
												obyazannosti,
												trebovaniya,
												usloviya,
												data_create,
												status,
												id_dept)
										VALUES	(:name,
												:zarplata_ot,
												:zarplata_do,
												:exp,
												:edu,
												:obyazannosti,
												:trebovaniya,
												:usloviya,
												NOW(),
												0,
												:id_dept)"
							);
	$res->bindParam(':name', $name);
	$res->bindParam(':zarplata_ot', $zarplata_ot);
	$res->bindParam(':zarplata_do', $zarplata_do);
	$res->bindParam(':exp', $exp);
	$res->bindParam(':edu', $edu);
	$res->bindParam(':obyazannosti', $obyazannosti);
	$res->bindParam(':trebovaniya', $trebovaniya);
	$res->bindParam(':usloviya', $usloviya);
	$res->bindParam(':id_dept', $id_dept);
	
	$name =  substr(htmlspecialchars(trim($_POST['name'])), 0, 100); 
    $zarplata_ot =  substr(htmlspecialchars(trim($_POST['zarplata_ot'])), 0, 10); 
	$zarplata_do =  substr(htmlspecialchars(trim($_POST['zarplata_do'])), 0, 10); 
    $expiriens =  substr(htmlspecialchars(trim($_POST['expiriens'])), 0, 50); 
    $education =  substr(htmlspecialchars(trim($_POST['education'])), 0, 50); 
    $obyazannosti =  substr(nl2br(trim($_POST['obyazannosti'])), 0, 1000); 
    $trebovaniya =  substr(nl2br(trim($_POST['trebovaniya'])), 0, 1000); 
	$usloviya =  substr(nl2br(trim($_POST['usloviya'])), 0, 1000);
	$id_dept = $_POST['dept'];
	$edu = $_POST['edu'];
	$exp = $_POST['exp'];
$res->execute();
header ("location: index.php");
?>