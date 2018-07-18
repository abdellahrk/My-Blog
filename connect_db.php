<?php
require 'credentials.php';

try{
    $pdo = new PDO("mysql:host=localhost;dbname=blog", $username, $password);
    //echo "connected successfully";

} catch(PDOException $e){
    echo "could not connect to the db " . $e->getMessage(); 
}