<?php
error_reporting(E_ALL);

$upload_directory = "json_files";
$file_moved = false;
$file_accepted = false;
if (isset($_POST, $_FILES['json_file']) && $_FILES['json_file']['size']>0) {
    $whitelist = '/.(json)$/i';
    if (preg_match($whitelist, $_FILES['json_file']['name']))
    {
        $file_name = $_FILES['json_file']['name'];
        $tmp_path = $_FILES['json_file']['tmp_name'];
        if (move_uploaded_file($tmp_path, "$upload_directory/$file_name"))
        {
            $file_moved = true;
        }
        $file_accepted = true;
    }
}
$json_files = scandir($upload_directory);
unset($json_files[0]);
unset($json_files[1]);
include 'header.php';
?>


    <div class="main-container">
        <fieldset class="main-container-fieldset-main">
            <?php if ($file_moved == true && $file_accepted == true) { ?>
                <p class="main-container-fieldset-main__text">Файл был загружен:)</p>
            <?php } ?>
            <table class="main-container-table">
                <?php foreach ($json_files as $file_names) { ?>
                    <tr class="table-row">
                        <td class="table-cell"><a class="main-container__link" href="test.php?file_name=<?= $file_names?>"><?= stristr($file_names, '.', true) ?></a></td>
                    </tr>
                <?php } ?>
            </table>
        </fieldset>
    </div>


<?php include 'footer.php'; ?>