<?php

class Task
{
    private $bdd;

    public string $name;

    public string $description;

    public string $category;

    public string $date;

    function __construct($bdd, $name, $description, $category, $date)
    {
        $this->bdd = $bdd;
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->date = $date;
    }

    function save()
    {
        //preparer la requete (SQL)
        $pdoStat = $this->bdd->prepare('INSERT INTO tasks VALUES(NULL, :name , :description, :date, :category)');

        // Chaque marqueur a une valeur
        $pdoStat->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStat->bindValue(':description', $this->description, PDO::PARAM_STR);
        $pdoStat->bindValue(':date', $this->date, PDO::PARAM_STR);
        $pdoStat->bindValue(':category', $this->category, PDO::PARAM_STR);
        
        return $pdoStat->execute();


    }

    function getTime()
    {
       
    }
}


//$bdd = new PDO('mysql:host=localhost;dbname=bloc_note', 'root', '');
//$task = new Task($bdd, "Faire la vaisselle", "Description", "Ménage", "");

//echo $task->name;
//$task->save();


// $user->name
// $user->sendMessage($user2)
