<?php
error_reporting(E_ALL);
require 'get_file.php';
//Проверим, введено ли имя тестируемого
if (!empty($_POST['user_name'])) {
    $user_name = $_POST['user_name'];
    $user_attention = "Ваши результаты теста, $user_name! ";
} else {
    $user_name = null;
    $user_attention = 'Вы забыли ввести свое имя!';
}
//Проверим, пройден ли сам тест
if (!empty($_POST) && count($_POST)==count($response)+1) {
    $count_POST_mas = 0;
    $results = [];
    $right_answers = 0;//Посчитаем, сколько правильных ответов (понадобится для надписи на сертификате)
    foreach ($response as $answer) {
        if (is_array($answer['answers'][$_POST["q$count_POST_mas"]])) {
            $results[] = "Верно!";
            $right_answers++;
        } else {
            $results[] = "Не верно!";
        }
        $count_POST_mas++;
    }
}
else {
    $results[] = null;
}

$all_answers = count($response);//Посчитаем, сколько всего заданий (понадобится для надписи на сертификате)

include 'header.php';
?>
<div class="main-container">
    <fieldset class="main-container-fieldset-main">
        <form action="test.php?file_name=<?= $file_name?>" method="POST">
            <?php if ($results[0]!=null) {?>
                <p class="main-container-fieldset-main__text"><img src="create_certificate.php?user_name=<?= $user_name?>&right_answers=<?= $right_answers ?>&all_answers=<?= $all_answers ?>" width="400" height="250"></p>
                <p class="main-container-fieldset-main__text"><?= $user_attention ?></p><br/>
                <?php $count=1; foreach ($results as $value) { ?>
                    <p class="main-container-fieldset-main__text">Ответ на задание <?= $count?> : <?= $value?></p><br/>
        <?php $count++; } ?>
                <p class="main-container-p__button"><input class="main-container__button-check" type="submit" value="Решить снова ->"></p>
            <?php } else { ?>
                <p class="main-container-fieldset-main__text">Вы прошли не весь тест! Пожалуйста, пройдите тест целиком!</p>
                <p class="main-container-p__button"><input class="main-container__button-check" type="submit" value="Пройти снова ->"></p>
            <?php } ?>
        </form>

        <form action="list.php" method="POST">
            <p class="main-container-p__button"><input class="main-container__button-check" type="submit" value="<- Список тестов"></p>
        </form>
    </fieldset>
</div>

<?php include 'footer.php'; ?>
