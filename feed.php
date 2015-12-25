<?php
$lastname = substr(htmlspecialchars(trim($_POST['lastname'])), 0, 100);
$firstname = substr(htmlspecialchars(trim($_POST['firstname'])), 0, 100);
$email = substr(htmlspecialchars(trim($_POST['email'])), 0, 30);
$textarea = substr(htmlspecialchars(trim($_POST['textarea'])), 0, 1500);
$mess = "$lastname $firstname\n$email\n $textarea";
$subj = "Форма обратной связи";
$to = "info@istria-spb.ru";
$from="admin@istria-spb.ru";
$headers = "From: $from\nReply-To: $from\n";
mail($to, $subj, $mess, $headers);
if (!headers_sent($filename, $linenum)) {
    header('Location: http://istria-spb.ru/send_feed_complete.html');
    exit;
} else {
    echo "Заголовки уже отправлены в $filename на строке $linenum\n" .
          "Редирект невозможен, пожалуйста нажмите <a " .
          "href=\"http://www.istria-spb.ru\">Здесь</a> самостоятельно\n";
    exit;
}
?>