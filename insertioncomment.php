<?php

include "object.php";


$objetPdo = new PDO('mysql:host=localhost;dbname=bloc_note', 'root', '');

$task = new Task($objetPdo,'', '', '', '', $_GET['comment']);

$task->saveComment($_GET['id']);



$insertIsOk = $task->save();



if($insertIsOk){
     
    $message ='La tache a etait ajouté dans la bdd';

    header ('Location:./index.php ');

}  else {
    $message ='Echec de insertintion';

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  </head>
<body>

<h1>insertions des contact</h1>

<p><?php echo $message ?></p>

</body>
</html>