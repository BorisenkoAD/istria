<?php
include "dbLib.php";
$id = $_GET['id'];
$stmt = $connection->prepare('UPDATE vacansy SET status = 0 WHERE id = ?');
$stmt->bindValue(1, $id, PDO::PARAM_INT);
$stmt->execute();
header ("location: index.php");
?>