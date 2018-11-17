<div class="jumbotron text-center">
    <div class="container">
        <h1 class="h3 mb-3 font-weight-normal"><?php echo $title; ?></h1>
    </div>
</div>

<div class="container">
    
    <?php for( $i = 0; $i < count($articles); $i++ ):
        $article = $articles[ $i ]; ?>
    <div class="card flex-row flex-wrap m-4">

        <div class="ArticleImage <?php if( ($i % 2) == 0){ echo 'ArticleImage-l order-1'; }else{ echo 'ArticleImage-r order-2'; } ?>">
            <img alt="" src="/img/<?php echo $article['image']; ?>" height="40">
        </div>

        <div class="ArticleContent flex-grow-1 <?php if( ($i % 2) == 0){ echo 'order-2'; }else{ echo 'order-1'; } ?>">
            <h4 class="card-title"><?php echo $article['title'] ?></h4>
            <p class="lead text-muted"><?php echo $article['author'].' - '.$article['date']; ?></p>
            <p class="card-text"><?php echo $article['resume']; ?></p>
            <p style="margin-left: 12px;"><a class="btn btn-secondary" href="/index.php/article/read/<?php echo $article['id']; ?>">View details »</a></p>   
        </div>

    </div>
        <?php endfor; ?>   
</div>