<!-- <?php
include "dbLib.php";
?> -->
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Добавление вакансии</title>
 	<link rel="stylesheet" type="text/css" href="css/style_test.css" /> 
	<link rel="stylesheet" type="text/css" href="css/form.css" />

 </head> 
<body>
<div id="wrapper">
	<nav>
		<a href="http://www.istria-spb.ru/vacansy/">Главная</a> 
	</nav>

 <form method="post" action="addvacansy.php" class="form">
	<div id="Gen_inf">	
		<p>Общая информация</p>	
			<p>
	
			<label for="dept"><span class="formTextRed">*</span> Ответственный отдел:</label>
			<select name="dept" id="dept" required>
		<?php 	$stmt = $connection->prepare('SELECT * from s_hr_dept');
				$stmt->execute();
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{?>					
			<option value="<?php echo $row["id"]?>"><?php echo $row["f_name"]?></option>
					<?}?>
			</select>
			</p>
			<p>
			<label for="name"><span class="formTextRed">*</span> Наименование должности:</label>
			<input type="text" name="name" id="name"  placeholder="Аналитик"/>
			</p>
			<p>
			<label for="zarplata_ot"><span class="formTextRed">*</span> Заработная плата от, руб.:</label>
			<input type="text" name="zarplata_ot"  id="zarplata_ot" placeholder="25 000 только цифра"/>
			</p>
			<p>
			<label for="zarplata_do"><span class="formTextRed">*</span> Заработная плата до, руб.:</label>
			<input type="text" name="zarplata_do"  id="zarplata_do" placeholder="50 000 только цифра"/>
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
			<textarea type="text" name="obyazannosti"  id="obyazannosti" placeholder="Обязанности"></textarea>
			</p>
			<p>
			<label for="trebovaniya"> Требования:</label>
			<textarea type="text" name="trebovaniya"  id="trebovaniya" placeholder="Требования"></textarea>
			</p>
			<p>
			<label for="usloviya"> Условия:</label>
			<textarea type="text" name="usloviya"  id="usloviya" placeholder="Условия работы"></textarea>
			</p>	
	<p class="submit">
	<input type="submit" value="Отправить" />
	</p>
	</div><!--Description_vacansy-->	
 </form> 
 <div style="clear: both;"></div>
 	<footer>	
	</footer>
</div><!--wrapper-->
</body>