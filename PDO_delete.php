<?php

if (isset($_GET['id'])) {
    /**
     * @var PDO $connection
     */

    require_once 'connection.php';


    $sql = 'DELETE FROM `names` WHERE `id` = :userid';
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':userid', $_GET['id']);
    $stmt->execute();
    echo '</br>Строка удалена.';
    echo "</br></br><a href='PDO_crud.php'>Вернуться</a>";
}


?>
