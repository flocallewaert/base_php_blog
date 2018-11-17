<?php

require '../src/model/model-article.php';
global $bdd;

/* function called when no function was given to the controller */
function articleIndex()
{
    articleList();
}

function articleCreate( )
{
    
}

function articleRead( int $id )
{

    // check arguments
    if( empty( $id ) ) { 
        return false;
    }

    // get username to know if connected
    $username = null;
    if(isset($_SESSION['username'])) {
        $username = htmlspecialchars($_SESSION['username']);
    }

    // get data from model
    $article = articleGetOne( $id );
    $title = $article['title'];

    // create view
    ob_start();

    require '../src/view/view-article-read.php';
    $content = ob_get_clean();

    // insert data into template
    require '../src/view/template/default.php';
    
    return true;
}

function articleUpdate( int $id )
{
    
}

function articleDelete( int $id )
{
    
}

function articleList( int $numPage = 0)
{
    // check arguments
    if( empty( $numPage ) ) { 
        $numPage = 0;
    }

    // get data from model

    // create view
    ob_start();
    // $articles = articleGetAll();
    $articles = articleGetPage( $numPage );

    // set the resume
    foreach($articles as &$article){
        $article['resume'] = substr($article['content'], 0, 60).' ...';
    }
    $title = "Articles list";
    
    require '../src/view/view-article-list.php';
    $content = ob_get_clean();

    // insert data into template
    require '../src/view/template/default.php';
    
    return true;
}