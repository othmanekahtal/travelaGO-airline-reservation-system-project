<?php
require_once APPROOT . '/views/include/header.php';
?>
<h1>
    <?php
    echo '<br>';
    echo $data['title'];
    ?>
</h1>
<ul>
    <?php
    foreach ($data['count'] as $value) {
        echo $value["id"] . "<br>";
    }
    ?>
</ul>
<?php
require_once APPROOT . '/views/include/footer.php';
?>
