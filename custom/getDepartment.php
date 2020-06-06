<?php
    require('../func/config.php');

    $stmt = $db->prepare('SELECT Department  FROM profilemaster WHERE Id = :Id');
    $stmt->execute(array('Id' => $_GET['UserId']));
    $row = $stmt->fetch();

    echo $row['Department'];


 ?>
