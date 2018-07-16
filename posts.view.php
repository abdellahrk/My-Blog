<?php
$title = 'Posts';

require 'head/header.php';

require 'footer.php';

?>

<div class="container">
<div class="row">
          <?php foreach ($posts as $post): ?>


          <div class="col-md-4">
            <h3> <?php echo $post->title; ?> </h3>
            <p> <?php echo $post->content; ?> </p>
            <p><a class="ui primary basic button read_more" href="#" role="button">Read More &raquo;</a></p>
           
            <span>author: <?php echo $post->author; ?> </span>
          </div>

          <?php endforeach; ?>

</div>
   
    
</div>