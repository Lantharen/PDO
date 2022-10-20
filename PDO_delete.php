<?php
const DB_HOST = '127.0.0.1';
const DB_NAME = 'site';
const DB_USER = 'root';
const DB_PASS = '';
const DB_CHARSET = 'utf8mb4';


if(isset($_GET['id']))
{
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';dbcharset=' . DB_CHARSET;
    try {
        $connection = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
        $sql = 'DELETE FROM `names` WHERE `id` = :userid';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':userid', $_GET['id']);
        $stmt->execute();
        echo '</br>Строка удалена.';
        echo "</br></br><a href='PDO_crud.php'>Вернуться</a>";
    }
    catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
}
?>
