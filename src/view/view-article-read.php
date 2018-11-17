    
<div class="jumbotron text-center">
    <div class="container">
        <h1 class="h3 mb-3 font-weight-normal"><?php echo $article['title']; ?></h1>
        <p class="lead text-muted"><?php echo $article['author'].' - '.$article['date']; ?></p>
    </div>
</div>

<div id="container">
    <?php echo $article['content']; ?>
</div>