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
}
catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
<form action="PDO_insert.php" method="post">
    <input type="text" name="firstname" required>
    <input type="text" name="lastname" required>
    <input type="submit" value="Create">
</form>

<ol>
    <?php
    $sql = "SELECT * FROM `names`";
    $result = $connection->query($sql);
    echo "<table><tr><th>Firstname</th><th>Lastname</th></tr>";

    while ($names = $result->fetch()) {
        echo "<tr>";
        echo "<td>" . '<li>' . "<a href='PDO_edit.php'" . ">  " . htmlspecialchars($names["firstname"]) . "</a>" . '</li>' . "</td>";
        echo "<td>" . "<a href='PDO_edit.php'" . ">  " . htmlspecialchars($names["lastname"]) . "</a>" . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    ?>
</ol>
</body>
</html>





