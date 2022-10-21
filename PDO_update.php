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
    <title>Update</title>
</head>
<body>
<?php
// если запрос GET
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']))
{
    $userid = $_GET['id'];
    $sql = "SELECT * FROM `names` WHERE `id` = :userid";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':userid', $userid);
    // выполняем и получаем id пользователя
    $stmt->execute();
    if($stmt->rowCount() > 0){
        foreach ($stmt as $row) {
            $username = $row['firstname'];
            $lastname = $row['lastname'];
        }
        echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Имя:
                    <input type='text' name='firstname' value='$username' /></p>
                    <p>Фамилия:
                    <input type='text' name='lastname' value='$lastname' /></p>
                    <input type='submit' value='Сохранить' />
            </form>";
    }
    else{
        echo 'Пользователь не найден';
    }
}
elseif (isset($_POST['id']) && isset($_POST['firstname']) && isset($_POST['lastname'])) {

    $sql = "UPDATE `names` SET `firstname` = :username, `lastname` = :lastname WHERE `id` = :userid";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':userid', $_POST['id']);
    $stmt->bindValue(':username', $_POST['firstname']);
    $stmt->bindValue(':lastname', $_POST['lastname']);

    $stmt->execute();
    header('Location: PDO_crud.php');
}
else{
    echo 'Некорректные данные';
}
?>
</body>
</html>