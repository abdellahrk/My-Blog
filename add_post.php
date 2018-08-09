<?php
$title = 'Add Post';


require 'connect_db.php';
require 'inc/header.php';
require 'Image_upload.php';
?>
<div class="ui two column centered grid">
    <div class="column">

<div class="ui form" >
    <form method="post" enctype="multipart/form-data" id="add_post">
        <div class="field">
            <label>Title</label>
            <input type="text" name="title">
        </div>
        <div class="field">
            <label>Content</label>
            <textarea type="text" name="content"></textarea>
        </div>
        <div class="field">
            <label>Upload Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <input class="ui teal icon button" type="submit" value="Add Post" name="submit">
    </form>
<!-- TODO: add success message on succesful form submission. -->

</div>
        
</div>
</div>


<?php
$currentDir = getcwd();
$uploadDir = "/uploads/";

$errors = []; // store all foreseen and unforseen errors

$fileExtensions = ['jpeg', 'jpg', 'png'];

$fileName = $_FILES['image']['name'];
$fileSize = $_FILES['image']['size'];
$fileTmpName = $_FILES['image']['tmp_name'];
$fileType = $_FILES['image']['type'];
$fileExtension = strtolower(end(explode('.', $fileName)));

$uploadPath = $currentDir . $uploadDir . basename($fileName);

?>


<?php

if(isset($_POST['submit'])){

    $sql = 'INSERT INTO posts (image, title, content, date)
            VALUES(:image, :title, :content, NOW())';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':image', $fileName, PDO::PARAM_STR);
    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(':content', $_POST['content'], PDO::PARAM_STR);

    $stmt->execute();
    //$OK->$stmt->rowCount();
    
    /*
        Upload post image
    */

    if(! in_array($fileExtension, $fileExtensions)){
        $errors[] = "This file extension is not allowed. Please upload a jpeg or jpg";
    }

    if($fileSize > 2000000){
        $errors[] = "This file is more than 2MB. ";
    }
    
    if(empty($errors)){
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        if($didUpload){
            //echo "The file " . basename($fileName) . " has been uploaded";
            header('Location: views/posts.view.php');
        }  else {
            echo "An error occured somewhere. Try again.";   
        } 
    } else{
        foreach ($errors as $error){
            echo $error . " These are the errors " . "\n";
        }
    } /*
    $upload_img_sql = "INSERT INTO post_image (name, path, type)
                        VALUES('$fileName', '$uploadPath', '$fileType')";
    $uploaded = $pdo->prepare($upload_img_sql)->execute();
    */
}

require 'inc/footer.php';

