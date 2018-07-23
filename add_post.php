<?php
$title = 'Add Post';

require 'connect_db.php';
require 'inc/header.php';
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
        <input class="ui teal icon button" type="submit" value="Add Post" name="submit">
    </form>
<!-- TODO: add success message on succesful form submission. -->
    
</div>
        
</div>
</div>


<?php

if(isset($_POST['submit'])){

    $sql = 'INSERT INTO posts (title, content, date)
            VALUES(:title, :content, NOW())';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(':content', $_POST['content'], PDO::PARAM_STR);

    $stmt->execute();
    $OK->$stmt->rowCount();

    if($OK){
        header('Location: posts.view.php');
    }

}

require 'inc/footer.php';

