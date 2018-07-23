<?php
$title = 'Edit Post';

require 'connect_db.php';
require 'inc/header.php';
require 'Posts.php';
/*
  $statement = $pdo->prepare("SELECT * FROM posts WHERE id='".$_GET['id']."' ");
  $statement->execute();
  while ($all_posts = $statement->fetchAll(PDO::FETCH_CLASS, 'Posts')){

  $id = $all_post->id;
  $title = $all_post->title;
  $content = $all_post->content;
  $date = $all_post->date;
  $author = $all_post->author;

*/

if (isset($_GET['id']) && !$_POST) {
    // prepare SQL query
    $sql = 'SELECT id, title, content, date, author FROM posts
    WHERE id = ?';

    $stmt = $pdo->prepare($sql);
    // bind the results
    $stmt->bindColumn(1, $id);
    $stmt->bindColumn(2, $title);
    $stmt->bindColumn(3, $content);
    $stmt->bindColumn(4, $date);
    $stmt->bindColumn(5, $author);

    // execute query by passing array of variables
    $OK = $stmt->execute(array($_GET['id']));
    $stmt->fetch();

}
  
?>


<div class="ui two column centered grid">
    <div class="column">

<div class="ui form" >
    <form method="post">
        <div class="field">
            <label>Title</label>
            <input type="text" name="title"  value="<?php  echo htmlentities($title, ENT_COMPAT, 'utf-8');?>" >
        </div>
        <div class="field">
            <label>Content</label>
            <textarea type="text" name="content" >
            <?php echo htmlentities($content, ENT_COMPAT, 'utf-8');?>
            </textarea>
        </div>
        <input class="ui teal icon button" type="submit" value="submit" name="update">
        <input name="id" type="hidden" value="<?php echo $id; ?>" > 
    </form>
    
<!-- TODO: add success message on succesful form submission. -->
    
</div>
        
</div>
</div>

<?php

if(isset($_POST['update'])){
    //echo '<script type="text/javascript">alert("'.$_GET['id'].'") </script> ';
    
    $query = "UPDATE posts SET title= ?, content = ? WHERE id = ?" ;

    $stmt = $pdo->prepare($query);

    $stmt->execute(array($_POST['title'], $_POST['content'], $_GET['id']));

    header('Location: post.view.php?id='.$_GET['id']);

}

?>

<?php
  
require 'footer.php';

?>