<?php
$title = 'Add Post';

require 'connect_db.php';
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
<!-- TODO: add success message on succesful form submission. -->
    
</div>
        
</div>
</div>

<?php

require 'footer.php';

?>

<?php

if(isset($_POST['submit'])){

    $sql = "INSERT INTO posts(title, content) 
    VALUES('".$_POST["title"]."', '".$_POST["content"]."') "; 

    if($pdo->query($sql)){
        //$success = '<div class="ui green message">Green</div>';
        //echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
        header('location: posts.view.php');
    } else{
        echo "<script type= 'text/javascript'>alert('Not Successful');</script>";
    }
}