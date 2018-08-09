<?php
$title = 'Post';
require '../connect_db.php';
require '../inc/header.php';

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
                href="../update_post.php?id=<?php echo $id;?>" role="button">Edit &raquo;</a></p>
            </div>
            <div class="center aligned column">
                <p><a class="ui teal icon button read_more"   
                href="../delete_post.php?id=<?php echo $id;?>" role="button">Delete &raquo;</a></p>
            </div>
        </div>
    </div>

</div>

<div id="disqus_thread" class="container"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://my-blog-q72d7t4mau.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            

<?php 
require '../inc/footer.php';