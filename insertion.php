<?php
 


 // INSERT ....




    //ouverture d'une connexion a la bdd agenda
    $objetPdo = new PDO('mysql:host=localhost;dbname=bloc_note', 'root', '');



       //preparer la requete (SQL)
       $pdoStat = $objetPdo->prepare('INSERT INTO tasks VALUES(NULL, :name , :description, :date, :category)');

       // Chaque marqueur a une valeur
       $pdoStat->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
       $pdoStat->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
       $pdoStat->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
       $pdoStat->bindValue(':category', $_POST['category'], PDO::PARAM_STR);
       var_dump($_POST);

// exécuter la requéte préparer


   $insertIsOk   =$pdoStat->execute();



   if($insertIsOk){

   $message ='Le contact a etait ajouté dans la bdd';
   
   header ('Location:./index.php ');
   
   }

   else{
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