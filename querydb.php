<?php

/* database connection */

require 'Posts.php';


try{
    $pdo = new PDO("mysql:host=localhost;dbname=blog", 'dolphin', 'iamdolphin');
    echo "connected successfully";

} catch(PDOException $e){
    echo "could not connect to the db " . $e->getMessage(); 
}
$statement = $pdo->prepare('SELECT * FROM posts');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_CLASS, 'Posts');



