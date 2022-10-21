<?php


/**
 * @var PDO $connection
 */

require_once 'connection.php';

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





