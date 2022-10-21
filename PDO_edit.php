<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
<h2>Список пользователей</h2>
<?php

/**
 * @var PDO $connection
 */

require_once 'connection.php';


    $sql = "SELECT * FROM `names`";
    $result = $connection->query($sql);
    echo "<table><tr><th>Имя</th><th>Фамилия</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
        echo "<td><a href='PDO_update.php?id=" . htmlspecialchars($row['id']) . "'>Обновить</a></td>";
        echo "<td><a href='PDO_delete.php?id=" . htmlspecialchars($row['id']) . "'>Удалить</a></td>";

        echo "</tr>";
    }
    echo "</table>";


?>
</body>
</html>