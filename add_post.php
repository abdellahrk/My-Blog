<?php
$title = 'Add Post';
require 'head/header.php';
?>
<div class="ui two column centered grid">
    <div class="column">

<div class="ui form" >
    <form method="post">
        <div class="field">
            <label>Title</label>
            <input type="text" name="title">
        </div>
        <div class="field">
            <label>Content</label>
            <textarea type="text" name="content"></textarea>
        </div>
        <input class="ui submit button" type="submit" value="submit" name="submit">
    </form>
</div>
        
    </div>
</div>

<?php

require 'footer.php';

?>

<?php

if(isset($_POST['submit'])){
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO posts(title, content) 
    VALUES('".$_POST["title"]."', '".$_POST["content"]."') "; 

    if($pdo->query($sql)){
        
        echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
        header('location: add_post.php');
    } else{
        echo "<script type= 'text/javascript'>alert('Not Successful');</script>";
    }
}