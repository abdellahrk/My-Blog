<?php
$title = 'Home';
include 'head/header.php';
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
            <div class="header"><a href="post.view.php?id=<?php echo $post->id;?>"><?php echo $post->title; ?></a></div>
            <div class="meta"><?php echo $post->date; ?></div>
            <div class="description">
              <p><?php echo $post->content; ?></p>
            </div>
          </div>
          <div class="extra content">
            <p><a class="ui teal icon button read_more" href="post.view.php?id=<?php echo $post->id;?>" role="button">Read More &raquo;</a></p>
          </div>
        </div>
        </div>
        <?php if($i++ == 3) break;?>
          <?php endforeach; ?>
        </div>

<!--
        <div class="row">
     //   <?php $i = 1; ?>
       //   <?php foreach ($posts as $post): ?>

          <div class="col-md-4">
            <h3>// <?php echo $post->title; ?> </h3>
            <p> <?php echo $post->content; ?> </p>
            <p><a class="ui primary basic button read_more" href="#" role="button">Read More &raquo;</a></p>
           
            <span>author: <?php echo $post->author; ?> </span>
          </div>
          <?php if($i++ == 3) break;?>
          <?php endforeach; ?>
        
          <div class="col-md-4">
            <h3>Projects</h3>
            <p>GitHub the medium of software collaboration is one place I really enjoy when I pull and push codes
                . Contributing in software is really a great thing to do as it enables me enjoy my passion.  
            </p>
            
            <p><a class="ui primary basic button" href="#" role="button">Read More &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h3>Coding in JS</h3>
            <p>I've never been active when it came to JavaScript one of the most popular language on the web today.
              This was because, I had no concentration learning a particular language and was learning at in one.
            </p>
            <p><a class="ui primary basic button" href="#" role="button">Read More &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h3>PHP Projects</h3>
            <p>Sample posts contents </p>
            <p><a class="ui primary basic button" href="#" role="button">Read More &raquo;</a></p>
          </div>

          -->
        </div>

      </div> <!-- /container -->

<?php


include 'footer.php';

?>
