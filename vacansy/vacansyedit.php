<?php
include "dbLib.php";
include "funcLib.php";
?> 
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Редактирование вакансии</title>
	<link rel="stylesheet" type="text/css" href="css/style_test.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />

 </head> 
<body>
<div id="wrapper">
	<header>
		<nav>
			<a href="http://www.istria-spb.ru/vacansy/">Главная</a> 
			<a href="http://www.istria-spb.ru/vacansy/vacansyadd.php">Добавить</a> 
		</nav>
	</header>
<?php
	$id = $_GET['id'];	
	$stmt = $connection->prepare('SELECT * FROM vacansy 
JOIN s_hr_dept ON (vacansy.id_dept = s_hr_dept.id)
JOIN s_edu ON (vacansy.id_edu = s_edu.id)
JOIN s_exp ON (vacansy.id_exp = s_exp.id)
WHERE vacansy.ID =?');
	$stmt->bindValue(1, $id, PDO::PARAM_INT);
	$stmt->execute();
	while($rows = $stmt->fetch(PDO::FETCH_ASSOC))
		{
?>
	
 <form method="post" action="editvacansy.php" class="form">
	<div id="Gen_inf">	
		<p>Общая информация</p>	
			<p>
			<input name="id" type="hidden" id="id" value="<?php echo $_GET['id']?>"/>
			<label for="name"><span class="formTextRed">*</span> Наименование должности:</label>
			<input type="text" name="name" id="name" value="<?php echo $rows["name"]?>"/>
			</p>
			<p>
			<label for="zarplata_ot"><span class="formTextRed">*</span> Заработная плата от:</label>
			<input type="text" name="zarplata_ot" id="zarplata_ot" value="<?php echo $rows["zarplata_ot"]?>"/>
			</p>
			<p>
			<label for="zarplata_do"><span class="formTextRed">*</span> Заработная плата до:</label>
			<input type="text" name="zarplata_do" id="zarplata_do" value="<?php echo $rows["zarplata_do"]?>"/>
			</p>
<p>
			<label for="exp"><span class="formTextRed">*</span> Опыт работы:</label>
			<select name="exp" id="exp" required>
			<?php 	$stmt = $connection->prepare('SELECT * from s_exp');
					$stmt->execute();
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{?>		
			<option value="<?php echo $row["id"]?>"><?php echo $row["title"]?></option>
					<?}?>				
			</select>
			</p>
<p>
			<label for="edu"><span class="formTextRed">*</span> Образование:</label>
			<select name="edu" id="edu" required>
			<?php 	$stmt = $connection->prepare('SELECT * from s_edu');
					$stmt->execute();
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{?>					
			<option value="<?php echo $row["id"]?>"><?php echo $row["edu_name"]?></option>
					<?}?>
			</select>
			</p>
	</div><!--Gen_inf-->
	<div id="Description_vacansy">	
		<p>Описание должности</p>	
			<p>
			<label for="obyazannosti"> Обязанности:</label>
			<textarea type="text" name="obyazannosti"  id="obyazannosti"><?php echo br2nl($rows["obyazannosti"])?></textarea>
			</p>
			<p>
			<label for="trebovaniya"> Требования:</label>
			<textarea type="text" name="trebovaniya"  id="trebovaniya"><?php echo br2nl($rows["trebovaniya"])?></textarea>
			</p>
			<p>
			<label for="usloviya"> Условия:</label>
			<textarea type="text" name="usloviya"  id="usloviya"><?php echo br2nl($rows["usloviya"])?></textarea>
			</p>	
<?php
	}
?>	
	<p class="submit">
	<input type="submit" value="Сохранить" />
	</p>
	</div><!--Description_vacansy-->	
 </form> 
	<div style="clear: both;"></div>
	<footer>
	
	</footer>
</div><!--wrapper-->
</body>