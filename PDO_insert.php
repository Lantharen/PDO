<?php


/**
 * @var PDO $connection
 */

require_once 'connection.php';




$firstName = $_POST['firstname'] ?? null;
$lastName = $_POST['lastname'] ?? null;

$firstName = htmlspecialchars($firstName);
$lastName = htmlspecialchars($lastName);



$sql = "INSERT INTO `names` (`firstname`, `lastname`) VALUES ('$firstName', '$lastName')";

$affectedRowsNumber = $connection->exec($sql);
echo "В таблицу Users добавлено строк: $affectedRowsNumber";

header('Location: PDO_crud.php');

?>

