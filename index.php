<?php
$deb= new DateTime("0000-01-01");
$fin = new DateTime("1300-12-31");
$curdate=new DateTime("0000-01-02");
//$curdate=new DateTime("9999-01-02");
if($deb<=$curdate && $curdate <= $fin){
   echo 'inclus';
}
else{
   echo 'exclus';
}

//connexion de base de donnée et récuperation
$bdd = new PDO('mysql:host=localhost;dbname=bloc_note', 'root', '');
$tasks = $bdd->query('SELECT * FROM tasks');

function dateDiff($date1, $date2){
    $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
    $retour = array();
 
    $tmp = $diff;
    $retour['second'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;
 
    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp;
 
    return $retour;
}

function remainingTime($date) {
    $date = strtotime($date);
    $now = time();

    $result = dateDiff($date, $now);


    if($now<= $date){
        return 'Il reste '.$result['day'].' Jours  '.$result['hour'].' heure '.$result['minute'].'  min et '.$result['second'].'  seconde';
    }
     else{
        echo 'Votre temp est ecoulé';
     }
   


}

/**
 * 1 . Ajouter les minutes et les secondes à l'affichage du temps. finis 
 * 
 * 
 * 2 . Modifier pour que si la date est passée afficher "En retard".
 * 
 * 3 . Si les jours dépassent 30, il faut rajouter la division par mois.
 */

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
                <form action="insertioncomment.php" method="GET"> 
                <input name="id" value="<?= $task['id'] ?>" />
                <h3><?php echo $task['comment']; ?></h3> 
                <textarea name="comment"></textarea>
                 <input type="submit" value="Ajouter un commentaire"> 
                
            </form>
            </div>
            <div class="task">
                <h2><?php echo $task['name']; ?></h2>
                <h3><?php echo $task['description']; ?></h3>
                <h3><?php echo remainingTime($task['date']); ?></h3>          
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
