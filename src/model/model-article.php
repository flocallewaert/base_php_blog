<?php

// I assume that if we include the bdd when we include the model
// connect to the bdd
if( empty($GLOBALS['bdd']) ){
    $GLOBALS['bdd'] = include '../src/core/bdd.php';
}

function articleGetAll()
{
    global $bdd;
    
    $sql = "SELECT id, title, content, image, author, DATE_FORMAT(articles.date, '%d %b %Y') AS date FROM `articles`";
    $res = $bdd->query($sql);
    $articles = $res->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}

function articleGetPage( int $numPage )
{
    global $bdd;
    $numPerPage = 5;
    $offset = $numPerPage * $numPage;

    $sql = "SELECT id, title, content, image, author, DATE_FORMAT(articles.date, '%d %b %Y') AS date FROM `articles` LIMIT :offset, :numPerPage";
    $statement = $bdd->prepare($sql);
    $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
    $statement->bindValue(':numPerPage', $numPerPage, PDO::PARAM_INT);
    $statement->execute();

    $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $articles;
}

function articleGetOne( int $id )
{
    global $bdd;

    $sql = "SELECT id, title, content, image, author, DATE_FORMAT(articles.date, '%d %b %Y') AS date FROM `articles` WHERE id= :id";
    $statement = $bdd->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $article = $statement->fetch(PDO::FETCH_ASSOC);
    
    return $article;
}