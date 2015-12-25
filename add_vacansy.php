<?php
	// подключение библиотек
	include_once "dbLib.php";

$stmt = $pdo->query('SELECT name FROM vacansy');
while ($row = $stmt->fetch())
{
    echo $row['name'] . "\n";
}	
?>	