<?php
include "dbLib.php";
?> 
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Полная вакансия</title>
  
	<link rel="stylesheet" type="text/css" href="css/style_test.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />

 </head> 
<body>
<?
$id = $_GET['id'];
	$stmt = $connection->prepare('SELECT * FROM vacansy 
JOIN s_hr_dept ON (vacansy.id_dept = s_hr_dept.id)
JOIN s_edu ON (vacansy.id_edu = s_edu.id)
JOIN s_exp ON (vacansy.id_exp = s_exp.id)
WHERE vacansy.ID =?');
	$stmt->bindValue(1, $id, PDO::PARAM_INT);
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{?>

<div id="wrapper">
	<header>
		<nav>
			<a href="http://www.istria-spb.ru/vacansy/">Главная</a> 
			<a href="http://www.istria-spb.ru/vacansy/vacansyadd.php">Добавить</a> 
		</nav>
	</header>
	<div id="VacancyView_sidebar">
	<div class="dept">
		<b>Ответственный: </b><p><?php echo $row["s_name"]?></p>	
	</div><!--dept-->
	<div class="data_create">
		<b>Вакансия создана: </b><p><?php echo $row["data_create"]?></p>	
	</div><!--data_create-->
	<div class="data_post">
		<b>Вакансия опубликована: </b><p><?php echo $row["data_post"]?></p>	
	</div><!--data_post-->
	<div class="data_edit">
		<b>Вакансия отредактирована: </b><p><?php echo $row["data_edit"]?></p>	
	</div><!--data_edit-->
	<div class="count">
		<b>Просмотров: </b><p><?php echo $row["count"]?></p>	
	</div><!--count-->
	<?if ($row["deleted"] == 1) {
		?><h1>УДАЛЕНО</h1><?		
	} else {?>
		<div class="image_action">
			<div class="image_del">
			<a href="deletevacansy.php?id=<?php echo $id?>"><img src="http://www.istria-spb.ru/vacansy/img/delete.png" width="95" height="95" alt="Удалить вакансию">
			</a>
			</div><!--image_del-->
			<div class="image_edit">
			<a href="vacansyedit.php?id=<?php echo $id?>"><img src="http://www.istria-spb.ru/vacansy/img/edit.png" width="95" height="95" alt="Редактировать вакансию">
			</a>
			</div><!--image_edit-->
			<div class="image_new">
			<a href="vacansyadd.php"><img src="http://www.istria-spb.ru/vacansy/img/new.png" width="95" height="95" alt="Добавить вакансию">
			</a>
			</div><!--image_new-->
			<div class="image_post">
			<a href="postvacansy.php?id=<?php echo $id?>"><img src="http://www.istria-spb.ru/vacansy/img/post.png" width="95" height="95" alt="Опубликовать вакансию">
			</a>
			</div><!--image_post-->
			<div class="image_unpost">
			<a href="unpostvacansy.php?id=<?php echo $id?>"><img src="http://www.istria-spb.ru/vacansy/img/unpost.png" width="95" height="95" alt="Снять с публикации вакансию">
			</a>
			</div><!--image_unpost-->
		</div><!--image_action-->
	<?}?>
	</div><!--VacancyView_sidebar-->
	<div id="VacancyView_main">
		<div class="vacansy_name">
			<h4><?php echo $row["name"] ?></h4>
		</div><!--vacansy_name-->
		<div class="VacancyView_salary">
			<span class="vacansy_salary">
				<b>
				<nobr>от&nbsp;<?php echo $row["zarplata_ot"] ?>&nbsp;до&nbsp;<?php echo $row["zarplata_do"] ?>&nbsp;руб.</nobr>
				</b>
			</span>
			<span><b><nobr>Опыт работы:&nbsp;<?php echo $row["title"] ?>, </nobr></b></span>
			<span><b><nobr>Образование:&nbsp;<?php echo $row["edu_name"] ?>.</nobr></b></span>
		</div><!--VacancyView_salary-->	
		<div class="VacancyDetails_section">
			<div class="VacancyDetails_title">Должностные обязанности:</div><!--VacancyDetails_title-->
			<div class="VacancyDetails_item">
			<?php echo $row["obyazannosti"] ?>
			</div><!--VacancyDetails_item-->
			<div class="VacancyDetails_title">Требования:</div><!--VacancyDetails_title-->
			<div class="VacancyDetails_item">
			<?php echo $row["trebovaniya"] ?>
			</div><!--VacancyDetails_item-->
			<div class="VacancyDetails_title">Условия:</div><!--VacancyDetails_title-->
			<div class="VacancyDetails_item">
			<?php echo $row["usloviya"] ?>
			</div><!--VacancyDetails_item-->
		</div><!--VacancyDetails_section-->
	</div><!--VacancyView_main-->
	<div style="clear: both;"></div>
<?}
?>
	<footer>	
	</footer>
</div><!--wrapper-->
</body>