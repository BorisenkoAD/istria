<?php
$username = 'u1063074_admin';
$password = 'TiEtIFnW1MwY)2)X';
try 
	{
    $connection = new PDO('mysql:host=192.168.137.105;dbname=db1063074_vacansy', $username, $password, array(
    PDO::ATTR_PERSISTENT => true));
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $connection->prepare("SET NAMES 'utf8'");
	$stmt->execute();
	} 
		catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>