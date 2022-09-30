<?php


//connexion de base de donnée et récuperation
$bdd = new PDO('mysql:host=localhost;dbname=bloc_note', 'root', '');
$tasks = $bdd->query('SELECT * FROM tasks');




// var_dump($task);

/**
 * .php à retirer
 * indentation
 * système de date
 * système de catégorie ou commentaires
 */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo  '<link rel="stylesheet" href="blocnotes.css" type="text/css">'; ?>

        <title>Blocnotes</title>
    </head>
    <body>

        <!-- <h1 data-text="Blocnotesimple">Blocnotesimple</h1> -->

        <h1>Blocnotesimple</h1>
        <div class="container">
            <div class="images">   
                <img src="./image/icons8-dossier-de-documents-24.png" alt="image">
            </div>
            <?php foreach($tasks as $task) { ?>
            <a href="./delete.php?id=<?= $task['id'] ?>">   
                <button>Supprimer</button>
            </a>
            <hr>
            <div class="category">
                <h2><?php echo $task['category']; ?></h2> 
            </div>
            <div class="task">
                <h2><?php echo $task['name']; ?></h2>
                <h3><?php echo $task['description']; ?></h3>
                <h3><?php echo $task['date']; ?></h3>
                
                <!-- Il reste 3 jours. -->
            </div>
            <?php } ?> 
            
            
            <form action="insertion.php" method="POST">
                
                <p>
                    <label>Category<label>
                    <input id="category" type="text" name="category">
           
                </p>

        
                <div class="form-input">
                    <label>Nom</label>
                    <input id="nom" type="text" name="name">
                </div>
         
                <div class="form-input">
                    <label>Description</label>
                    <input name="description">
                </div>
            
                <div class="form-input">
                    <label>Date</label>
                    <input type="datetime-local" name="date" id="date" >
                </div>
                
                <div class="form-input">
                    <input type="submit" value="Ajouter une nouvelle liste"  />
                </div>
            </form>
        </div>
       
       
 
    </body>
</html>
