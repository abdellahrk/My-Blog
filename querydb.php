<?php

/* database connection */
require 'credentials.php';
require 'connect_db.php';
require 'Posts.php';


$statement = $pdo->prepare('SELECT * FROM posts ORDER BY id DESC');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_CLASS, 'Posts');



