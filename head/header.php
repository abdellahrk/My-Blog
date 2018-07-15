<?php 
$title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/semantic.min.css" rel="stylesheet">
    <link href="assets/css/foundation.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <title>Blog - <?php echo $title;?></title>
</head>
<body>

<!-- The Navigation bar -->
<?php
include 'nav.php';

?>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container" align="center">
          <h1 class="display-3 center">Personal Blog</h1>
          <p>I own a blog. Blogging is something that makes sense to me. You'll find all what's happening to me in here.</p>
          <p>I own a blog</p>
          
          <p>you're viewing the <?= $title ?> page</p>
          <p>you're viewing the <?= $title ?> page</p> <br>
          <p>you're viewing the <?= $title ?> page</p>
    </div>
</div>