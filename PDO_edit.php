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
const DB_HOST = '127.0.0.1';
const DB_NAME = 'site';
const DB_USER = 'root';
const DB_PASS = '';
const DB_CHARSET = 'utf8mb4';

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';dbcharset=' . DB_CHARSET;

try {
    $connection = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
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
}
catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>
</body>
</html>