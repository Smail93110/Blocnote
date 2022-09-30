<?php
$bdd = new PDO('mysql:host=localhost;dbname=bloc_note', 'root', '');

$categories = $bdd->query('SELECT DISTINCT category FROM tasks');

//$executeIsOk = $tasks->execute(); //marche pas

//$categories = $categories->fetchAll(); // marche pas
//var_dump($categories);

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
    
<h1>Liste des taches de l'utilisateurs</h1>
<!--
<?php foreach ($categories as $category): ?>
  <?php 
    $tasks = $bdd->prepare('SELECT * FROM tasks WHERE category=:category');
    $tasks->bindValue(':category', $category['category']);
    $tasks->execute();
    // var_dump($tasks);
  ?>
  <h2><?= $category['category']  ?></h2>
-->
  <ul>
  <?php foreach ($tasks as $task): ?>

      <li>

        <?= $task['name'] ?>
        <?= $task['description'] ?> - <?= $task['date'] ?> 
        <?= $task['category'] ?>


      </li>
    <?php endforeach; ?>
  </ul>
<!--
<?php endforeach; ?>
  -->



</body>
</html>