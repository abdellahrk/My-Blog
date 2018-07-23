<?php
$title = 'Posts';

require '../inc/header.php';
require '../connect_db.php';
require '../Posts.php';

?>

<?php 
  $statement = $pdo->prepare('SELECT * FROM posts ORDER BY id DESC');
  $statement->execute();
  $all_posts = $statement->fetchAll(PDO::FETCH_CLASS, 'Posts');

?>
<div class="container">

  <?php foreach ($all_posts as $post): ?>

  <div class="ui very relaxed items">
    <div class="item">
        <div class="image">
          <img src="/images/wireframe/image.png">
        </div>
        <div class="content">
          <h3 class="ui header"> <a  href="post.view.php?id=<?php echo $post->id;?>"><?php echo $post->title; ?></a> </h3>
          <div class="description">
            <p> <?php echo substr($post->content, 0, 200); ?> </p>

           
              <div class="ui two column middle aligned very relaxed stackable grid">
                <div class="column">
                  <p><a class="ui teal icon button read_more" href="post.view.php?id=<?php echo $post->id;?>" role="button">Read More &raquo;</a></p>    
                </div>
                <div class="center aligned column">Posted: <?php echo $post->date; ?> </div>
              </div>
            

          </div>
        </div>
    </div>

    <?php endforeach; ?>
    
</div>


<?php 
require '../inc/footer.php'; 
