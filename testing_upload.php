<?php
$title = "uploads";
require 'inc/header.php';
require_once 'Image_upload.php';

?>


<?php

    if(isset($result)){
        echo '<ul>';
        foreach($result as $message):
            echo "<li>$message</li>";
        endforeach;
        echo '</ul>';
    }
?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name"image" ><br>
    <input type="submit" value="submit" name="submit">
</form>

<?php
$destination ='/home/abdellah/Desktop/blog/uploads/';
if(isset($_POST['submit'])){
    try{
        $upload = new Image_upload($destination);
        $upload->move();
        $result = $upload->getMessages();
    } catch(Exception $e){
        $e->getMessage();
    }
}

