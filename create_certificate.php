<?php

require 'GenerateByGD.php';

$image = new GenerateByGD();

if (isset($_GET['right_answers'],$_GET['all_answers'])&&!empty($_GET['user_name'])) {
    $user_name = $_GET['user_name'];
    $right_answers = $_GET['right_answers'];
    $all_answers = $_GET['all_answers'];
    $image->create_certificate($user_name, $right_answers, $all_answers);
} else {
    $image->create_certificate_collapse();
}



?>