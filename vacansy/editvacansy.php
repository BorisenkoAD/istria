<?php
include "dbLib.php";
$res = $connection->prepare("UPDATE vacansy SET 
									name=:name, zarplata_ot=:zarplata_ot, zarplata_do=:zarplata_do, 
									id_exp=:exp, id_edu=:edu, obyazannosti=:obyazannosti, trebovaniya=:trebovaniya, 
									usloviya=:usloviya, data_edit=NOW()
									WHERE ID=:id");
									
	$res->bindParam(':name', $name);
	$res->bindParam(':zarplata_ot', $zarplata_ot);
	$res->bindParam(':zarplata_do', $zarplata_do);
	$res->bindParam(':exp', $exp);
	$res->bindParam(':edu', $edu);
	$res->bindParam(':obyazannosti', $obyazannosti);
	$res->bindParam(':trebovaniya', $trebovaniya);
	$res->bindParam(':usloviya', $usloviya);
	$res->bindParam(':id', $id);
	$name =  substr(htmlspecialchars(trim($_POST['name'])), 0, 100); 
    $zarplata_ot =  substr(htmlspecialchars(trim($_POST['zarplata_ot'])), 0, 10); 
	$zarplata_do =  substr(htmlspecialchars(trim($_POST['zarplata_do'])), 0, 10); 
    $exp =  substr(htmlspecialchars(trim($_POST['exp'])), 0, 50); 
    $edu =  substr(htmlspecialchars(trim($_POST['edu'])), 0, 50); 
    $obyazannosti =  substr(nl2br(trim($_POST['obyazannosti'])), 0, 1000); 
    $trebovaniya =  substr(nl2br(trim($_POST['trebovaniya'])), 0, 1000); 
	$usloviya =  substr(nl2br(trim($_POST['usloviya'])), 0, 1000);
	$id=$_POST['id'];
$res->execute();
header ("location: vacansyview.php?id=$id");
?>