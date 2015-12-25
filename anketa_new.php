<?php 	
		include "dbLib.php";
		
		$mail = $_POST['mail'];
		$position =  substr(htmlspecialchars(trim($_POST['position'])), 0, 1000); 
        $schedule =  substr(htmlspecialchars(trim($_POST['schedule'])), 0, 1000); 
        $date_get_start =  substr(htmlspecialchars(trim($_POST['date_get_start'])), 0, 30); 
        $salary_desired =  substr(htmlspecialchars(trim($_POST['salary_desired'])), 0, 30); 
        $travel =  substr(htmlspecialchars(trim($_POST['travel'])), 0, 1000); 
        $lastname =  substr(htmlspecialchars(trim($_POST['lastname'])), 0, 1000); 
		$firstname =  substr(htmlspecialchars(trim($_POST['firstname'])), 0, 1000); 
        $middlename =  substr(htmlspecialchars(trim($_POST['middlename'])), 0, 1000); 
        $telephone =  substr(htmlspecialchars(trim($_POST['telephone'])), 0, 30); 
        $email =  substr(htmlspecialchars(trim($_POST['email'])), 0, 30); 
        $citizenship =  substr(htmlspecialchars(trim($_POST['citizenship'])), 0, 30); 
        $place_liv =  substr(htmlspecialchars(trim($_POST['place_liv'])), 0, 1000); 
        $birthday =  substr(htmlspecialchars(trim($_POST['birthday'])), 0, 30); 
		
        $Company_name =  substr(htmlspecialchars(trim($_POST['Company_name'])), 0, 30); 
        $post =  substr(htmlspecialchars(trim($_POST['post'])), 0, 100); 
        $start_job =  substr(htmlspecialchars(trim($_POST['start_job'])), 0, 30); 
        $end_job =  substr(htmlspecialchars(trim($_POST['end_job'])), 0, 30); 
        $responsibilities =  substr(htmlspecialchars(trim($_POST['responsibilities'])), 0, 1000); 
        $skills =  substr(htmlspecialchars(trim($_POST['skills'])), 0, 1000); 

        $Company_name_2 =  substr(htmlspecialchars(trim($_POST['Company_name_2'])), 0, 30); 
        $post_2 =  substr(htmlspecialchars(trim($_POST['post_2'])), 0, 100); 
        $start_job_2 =  substr(htmlspecialchars(trim($_POST['start_job_2'])), 0, 30); 
        $end_job_2 =  substr(htmlspecialchars(trim($_POST['end_job_2'])), 0, 30); 
        $responsibilities_2 =  substr(htmlspecialchars(trim($_POST['responsibilities_2'])), 0, 1000); 
        $skills_2 =  substr(htmlspecialchars(trim($_POST['skills_2'])), 0, 1000);

        $Company_name_3 =  substr(htmlspecialchars(trim($_POST['Company_name_3'])), 0, 30); 
        $post_3 =  substr(htmlspecialchars(trim($_POST['post_3'])), 0, 100); 
        $start_job_3 =  substr(htmlspecialchars(trim($_POST['start_job_3'])), 0, 30); 
        $end_job_3 =  substr(htmlspecialchars(trim($_POST['end_job_3'])), 0, 30); 
        $responsibilities_3=  substr(htmlspecialchars(trim($_POST['responsibilities_3'])), 0, 1000); 
        $skills_3 =  substr(htmlspecialchars(trim($_POST['skills_3'])), 0, 1000);
		
        $Institute =  substr(htmlspecialchars(trim($_POST['Institute'])), 0, 1000); 
        $speciality =  substr(htmlspecialchars(trim($_POST['speciality'])), 0, 1000); 
        $diplom =  substr(htmlspecialchars(trim($_POST['diplom'])), 0, 500); 
        $Grad_year=  substr(htmlspecialchars(trim($_POST['Grad_year'])), 0, 30);
		
        $Institute_2 =  substr(htmlspecialchars(trim($_POST['Institute_2'])), 0, 1000); 
        $speciality_2 =  substr(htmlspecialchars(trim($_POST['speciality_2'])), 0, 1000); 
        $diplom_2 =  substr(htmlspecialchars(trim($_POST['diplom_2'])), 0, 500); 
        $Grad_year_2 =  substr(htmlspecialchars(trim($_POST['Grad_year_2'])), 0, 30);
		
		$today = date("Y-m-d H:i:s");
			
	$content = file_get_contents('resume_form.html');
    $content = str_replace('{position}', $position, $content);
    $content = str_replace('{salary_desired}', $salary_desired, $content);	
	$content = str_replace('{schedule}', $schedule, $content);
	$content = str_replace('{date_get_start}', $date_get_start, $content);
	$content = str_replace('{travel}', $travel, $content);
	$content = str_replace('{lastname}', $lastname, $content);	
	$content = str_replace('{firstname}', $firstname, $content);
	$content = str_replace('{middlename}', $middlename, $content);
	$content = str_replace('{citizenship}', $citizenship, $content);
	$content = str_replace('{telephone}', $telephone, $content);
	$content = str_replace('{email}', $email, $content);
	$content = str_replace('{place_liv}', $place_liv, $content);
	$content = str_replace('{birthday}', $birthday, $content);
	$content = str_replace('{Institute}', $Institute, $content);
	$content = str_replace('{speciality}', $speciality, $content);
	$content = str_replace('{diplom}', $diplom, $content);
	$content = str_replace('{Grad_year}', $Grad_year, $content);
	
	$content = str_replace('{Institute_2}', $Institute_2, $content);
	$content = str_replace('{speciality_2}', $speciality_2, $content);
	$content = str_replace('{diplom_2}', $diplom_2, $content);
	$content = str_replace('{Grad_year_2}', $Grad_year_2, $content);
	
	$content = str_replace('{Company_name}', $Company_name, $content);
	$content = str_replace('{post}', $post, $content);
	$content = str_replace('{start_job}', $start_job, $content);
	$content = str_replace('{end_job}', $end_job, $content);
	$content = str_replace('{responsibilities}', $responsibilities, $content);
	$content = str_replace('{skills}', $skills, $content);
	
	$content = str_replace('{Company_name_2}', $Company_name_2, $content);
	$content = str_replace('{post_2}', $post_2, $content);
	$content = str_replace('{start_job_2}', $start_job_2, $content);
	$content = str_replace('{end_job_2}', $end_job_2, $content);
	$content = str_replace('{responsibilities_2}', $responsibilities_2, $content);
	$content = str_replace('{skills_2}', $skills_2, $content);	

    $content = str_replace('{Company_name_3}', $Company_name_3, $content);
    $content = str_replace('{post_3}', $post_3, $content);
    $content = str_replace('{start_job_3}', $start_job_3, $content);
    $content = str_replace('{end_job_3}', $end_job_3, $content);
    $content = str_replace('{responsibilities_3}', $responsibilities_3, $content);
    $content = str_replace('{skills_3}', $skills_3, $content);	
    file_put_contents('anketa_from_site.html', $content);	

  $filename = "anketa_from_site.html"; //Имя файла для прикрепления
  $to = $mail; //Кому
  $from = "admin@istria-spb.ru"; //От кого
  $subject = "Анкета с сайта от $today;"; //Тема
  $message = "Резюме с сайта во вложении.\n Открывай CHROME или FIREFOX"; //Текст письма
  $boundary = "---"; //Разделитель
  /* Заголовки */
  $headers = "From: $from\nReply-To: $from\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
  $body = "--$boundary\n";
  /* Присоединяем текстовое сообщение */
  $body .= "Content-type: text/html; charset='utf-8'\n";
  $body .= "Content-Transfer-Encoding: quoted-printablenn";
  $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
  $body .= $message."\n";
  $body .= "--$boundary\n";
  $file = fopen($filename, "r"); //Открываем файл
  $text = fread($file, filesize($filename)); //Считываем весь файл
  fclose($file); //Закрываем файл
  /* Добавляем тип содержимого, кодируем текст файла и добавляем в тело письма */
  $body .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode($filename)."?=\n"; 
  $body .= "Content-Transfer-Encoding: base64\n";
  $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
  $body .= chunk_split(base64_encode($text))."\n";
  $body .= "--".$boundary ."--\n";
  mail($to, $subject, $body, $headers); //Отправляем письмо	
if (!headers_sent($filename, $linenum)) {
    header('Location: http://istria-spb.ru/send_complete.html');
    exit;
} else {
    echo "Заголовки уже отправлены в $filename на строке $linenum\n" .
          "Редирект невозможен, пожалуйста нажмите <a " .
          "href=\"http://www.istria-spb.ru\">Здесь</a> самостоятельно\n";
    exit;
}
?>
