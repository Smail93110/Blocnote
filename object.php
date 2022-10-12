<?php

class Task
{
    private $bdd;

    public string $name;

    public string $description;

    public string $category;

    public string $date;

    public string $comment;

    function __construct($bdd, $name, $description, $category, $date, $comment)
    {
        $this->bdd = $bdd;
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->date = $date;
        $this->comment = $comment;
    }

    function save()
    {
        //preparer la requete (SQL)
        $pdoStat = $this->bdd->prepare('INSERT INTO tasks VALUES(NULL, :name , :description, :date, :category, :comment)');

        // Chaque marqueur a une valeur
        $pdoStat->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStat->bindValue(':description', $this->description, PDO::PARAM_STR);
        $pdoStat->bindValue(':date', $this->date, PDO::PARAM_STR);
        $pdoStat->bindValue(':category', $this->category, PDO::PARAM_STR);
        $pdoStat->bindValue(':comment', $this->comment, PDO::PARAM_STR);

        
        return $pdoStat->execute();


    }

    function getTime()
    {
    //   $date = new Datetime();
    //   echo $date->format('d/m/Y');
    //   var_dump($date);
    }

    function setComment($comment)
    {
        $this->comment = $comment;
    }

    function saveComment($id)
    {
        $pdoStat = $this->bdd->prepare('UPDATE tasks SET comment = :comment WHERE id = :id');

        $pdoStat->bindValue(':comment', $this->comment);
        $pdoStat->bindValue(':id', $id);

        return $pdoStat->execute();
    }
}


//$bdd = new PDO('mysql:host=localhost;dbname=bloc_note', 'root', '');
//$task = new Task($bdd, "Faire la vaisselle", "Description", "Ménage", "");

//echo $task->name;
//$task->save();


// $user->name
// $user->sendMessage($user2)
