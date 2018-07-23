<?php 
$title = 'Delete Post';
require 'connect_db.php';
require 'head/header.php';

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

        <div class="ui negative message">

            <h3 class="header">Are you sure you want to delete :</h3>
            
                <h3> <?php  echo htmlentities($title, ENT_COMPAT, 'utf-8');?></h3>
                    <!-- <div class="ui two column middle aligned very relaxed stackable grid"> -->
                        <form method="post">
                            <input class="ui teal icon button read_more" type="submit" value="Yes" name="delete">
                        </form>
                        <div>
                            <p><a class="ui teal icon button read_more"   
                            href="post.view.php?id=<?php echo $id;?>" role="button">No &raquo;</a></p>   
                        </div> 
              <!--  </div> -->
            
         </div>
    </div>
</div>

<?php

if(isset($_POST['delete'])){
    $sql = 'DELETE FROM posts WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_GET['id']));
    $deleted = $stmt->rowCount();

    if($deleted){
       // echo 'Not successful';
        header('Location: posts.view.php');
    }
}