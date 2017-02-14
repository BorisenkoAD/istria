<?php
$username = 'u1063074_adm';
$password = 'B4MS6/vtcXDm<?OO';
try 
	{
    $connection = new PDO('mysql:host=192.168.137.106;dbname=db1063074_ankety', $username, $password, array(
    PDO::ATTR_PERSISTENT => true));
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $connection->prepare("SET NAMES 'utf8'");
	$stmt->execute();
	} 
		catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>