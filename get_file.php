<?php
//Файл для получения json-файла и его декодирования
$file_name = $_GET['file_name'];
$dirname = 'json_files';
$content = file_get_contents($dirname.'/'.$file_name);
$response = json_decode($content,true);
?>