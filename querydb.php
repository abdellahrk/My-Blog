<?php

/* database connection */
require 'credentials.php';
require 'Posts.php';



try{
    $pdo = new PDO("mysql:host=localhost;dbname=blog", $username, $password);
    //echo "connected successfully";

} catch(PDOException $e){
    echo "could not connect to the db " . $e->getMessage(); 
}
$statement = $pdo->prepare('SELECT * FROM posts ORDER BY id DESC');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_CLASS, 'Posts');



