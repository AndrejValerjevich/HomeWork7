<?php
error_reporting(E_ALL);
require 'get_file.php';
include 'header.php';
?>
    <div class="main-container">
        <fieldset class="main-container-fieldset-main">
            <form action="check.php?file_name=<?= $file_name?>" method="POST">
                <p class="main-container-fieldset-main__text">Тест: <?= stristr($file_name, '.', true)?></p><br/>
                <p class="main-container-fieldset-main__text">Введите ваше имя: <label title="Ваше имя"><input class="main-container-fieldset-main__input" type="text" name="user_name"></label></p><br />
                <?php $count=0; foreach ($response as $test)  {?>
                    <fieldset class="main-container-fieldset-tests">
                        <legend class="main-container-fieldset-tests__legend"><?= $test['question'] ?></legend>
                        <?php for ($i = 0; $i < 4; $i++ ) { ?>
                        <label><input type="radio" name="q<?= $count?>" value="<?= $i ?>"><?=((!is_array($test['answers'][$i])) ? $test['answers'][$i] : $test['answers'][$i]['answer'])?></label>
                        <?php } ?>
                    </fieldset>
                    <?php $count++; } ?>
                <p class="main-container-p__button"><input class="main-container__button-check" type="submit" value="Отправить"></p>
            </form>
        </fieldset>
    </div>

<?php include 'footer.php'; ?>