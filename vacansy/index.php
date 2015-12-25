<!-- <?php
include "dbLib.php";
?> -->
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Просмотр вакансий</title>
  
	<link rel="stylesheet" type="text/css" href="css/style_test.css" />

 </head> 
<body>
<div id="wrapper">
	<header>
		<nav>
			<a href="http://www.istria-spb.ru/vacansy/">Главная</a> 
			<a href="http://www.istria-spb.ru/vacansy/vacansyadd.php">Добавить</a> 
		</nav>
	</header>
	<div style="clear: both;"></div>
		<div class="vacansy_block">
			 <?php	
				$stmt = $connection->query('SELECT * FROM vacansy 
											JOIN s_exp ON (vacansy.id_exp = s_exp.id)');
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{ 
			if ($row["deleted"] == 1){
				?><div class="vacansy_box vacansy_box_black"><?;
			} else if ($row["status"] == 0){
					?><div class="vacansy_box vacansy_box_red"><?;
				} else {
				?><div class="vacansy_box"><?};
				?>
				
					<div class="vacansy_name">
						<a href="vacansyview.php?id=<?php echo $row["ID"]?>"><?php echo $row["name"] ?></a>
					</div><!--vacansy_name-->
					<div class="vacansy_exp">
						<nobr>Опыт работы:&nbsp;<?php echo $row["title"] ?></nobr>
					</div><!--vacansy_exp-->
					<span class="vacansy_salary">
						<nobr>от&nbsp;<?php echo $row["zarplata_ot"] ?>&nbsp;до&nbsp;<?php echo $row["zarplata_do"] ?>&nbsp;руб.</nobr>
					</span>
				</div><!--vacansy_box-->
				<?}?>
		</div><!--vacansy_block-->
</div><!--wrapper-->
</body>