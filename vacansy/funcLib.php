<?
function br2nl($string)
{
    return preg_replace('/\<br(\s*)?\/?\>/i', " ", $string);
}
?>

