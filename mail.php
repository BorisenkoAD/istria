<?php
/* is_uploaded_file($_FILES['userfile']['tmp_name']) {*/
	$uploaddir = '/var/www/vhosts/22/137870/webspace/httpdocs/istria-spb.ru/istria2/tmp/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

/*	echo '<pre>';
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		echo "Файл корректен и был успешно загружен.\n";
	} else {
		echo "Возможная атака с помощью файловой загрузки!\n";
	}
}  else {
   echo "Возможная атака с участием загрузки файла: ";
   echo "файл '". $_FILES['userfile']['tmp_name'] . "'.";
}
?>
<?php

header('Content-Type: text/plain; charset=utf-8');
 */
try {
    
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['userfile']['error']) ||
        is_array($_FILES['userfile']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES['userfile']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    // You should also check filesize here. 
    if ($_FILES['userfile']['size'] > 1900000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // DO NOT TRUST $_FILES['userfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['userfile']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
			'doc' => 'application/msword',
			'docx'=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			
        ),
        true
    )) {
        throw new RuntimeException('Invalid file format.');
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    if (!move_uploaded_file(
        $_FILES['userfile']['tmp_name'],$uploadfile
  /*      sprintf('/var/www/vhosts/22/137870/webspace/httpdocs/istria-spb.ru/istria2/tmp/%s.%s', sha1_file($_FILES['userfile']['tmp_name']), $ext)*/
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    echo 'File is uploaded successfully.';
	//---------------------------------
$filename = $uploadfile;  // $_FILES['userfile']['name']; //Имя файла для прикрепления
$to = "paz001@yandex.ru";
$from = "d@e.f";
$subject = "тестовое письмо";
$message = $_POST['message'];

$subj = "=?utf-8?B?".base64_encode($subject)."?=";
$boundary = uniqid('np');
$nl = "\n";

$file = fopen($filename, "r");
$blob = fread($file, filesize($filename));
fclose($file);

$headers = "MIME-Version: 1.0" . $nl;
$headers .= "From: " . $from . $nl . "Reply-To: " . $from . $nl;
$headers .= "Content-Type: multipart/mixed;boundary=" . $boundary . $nl;

$msg = "This is a MIME encoded message."; 
$msg .= $nl . $nl . "--" . $boundary . $nl;
$msg .= "Content-type: text/html;charset=utf-8" . $nl . $nl;
$msg .= $message;
$msg .= $nl . $nl . "--" . $boundary . $nl;
$msg .= "Content-Type: application/octet-stream" . $nl;
$msg .= "Content-Transfer-Encoding: base64" . $nl;
$msg .= "Content-Disposition: attachment; " .
 "filename=\"=?utf-8?B?".base64_encode($filename)."?=\"" . $nl . $nl;
$msg .= chunk_split(base64_encode($blob)) . $nl;
$msg .= $nl . $nl . "--" . $boundary . "--";

mail($to, $subj, $msg, $headers);
	//---------------------------------
	// теперь этот файл нужно переименовать желательно в дату_время отправки
	// потом его отправить по почте админу 
	// и удалить его.

} catch (RuntimeException $e) {

    echo $e->getMessage();

}

?>