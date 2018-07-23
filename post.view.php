<?php
$title = 'Post';
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
    <h1 class="ui header"><?php echo htmlentities($title, ENT_COMPAT, 'utf-8'); ?> </h1>

    <p> <?php echo htmlentities($content, ENT_COMPAT, 'utf-8');?> </p>

    <p>Author: <?php echo htmlentities($author, ENT_COMPAT, 'utf-8'); ?> </p>
        <div class="ui two column middle aligned very relaxed stackable grid">
            <div class="column">
                <p><a class="ui teal icon button read_more"   
                href="update_post.php?id=<?php echo $id;?>" role="button">Edit &raquo;</a></p>
            </div>
            <div class="center aligned column">
                <p><a class="ui teal icon button read_more"   
                href="delete_post.php?id=<?php echo $id;?>" role="button">Delete &raquo;</a></p>
            </div>
        </div>
    </div>

</div>

<?php require 'footer.php';?>