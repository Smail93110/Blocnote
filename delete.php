<?php

$objetPdo = new PDO('mysql:host=localhost;dbname=bloc_note', 'root', '');

$pdoStat =$objetPdo->prepare('DELETE FROM tasks WHERE id=:id');
$pdoStat->bindValue(':id', $_GET['id']);





$deleteIsOk = $pdoStat->execute();

if ($deleteIsOk) {
    header('Location: ./index.php');
} else {
    echo "La suppression n'a pas fonctionné.";
}
?>