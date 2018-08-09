<?php
$title = 'Home';
require 'inc/header.php';
require 'querydb.php';
?>

</div>
</div>

<div class="container">

    <div class="row" align="center">
        <div class="col">
          <h1 class="ui header heading">Welcome to my Blog</h1>
            <p>You can find everything about me in this blog and also things related to technology.
                Check out regularly for daily updates and more.
            </p>
        </div>
      
    </div>
   
   
        <!-- Example row of columns -->
        <div class="row">
        <?php $i = 1; ?>
          <?php foreach ($posts as $post): ?>
          <div class="col-md-4">

            <div class="ui card">
              <div class="content">
                <div class="header"><a href="views/post.view.php?id=<?php echo $post->id;?>"><?php echo $post->title; ?></a></div>
                <div class="meta"><?php echo $post->date; ?></div>
                <div class="description">
                  <p><?php echo substr($post->content,0 ,200); ?></p>
                </div>
              </div>
              <div class="extra content">
                <p><a class="ui teal icon button read_more" href="views/post.view.php?id=<?php echo $post->id;?>" role="button">Read More &raquo;</a></p>
              </div>
            </div>
        </div><br>
        <?php if($i++ == 6) break;?>
          <?php endforeach; ?>
        </div>
</div>
<?php


require '../inc/footer.php';


