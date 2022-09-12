<?php

$file_tmp = $_FILES['file']['tmp_name'];
$data = file($file_tmp);

foreach($data as $line){

    $line = trim($line);
    $value = explode('_', $line);
    //var_dump($value);

}




?>