<?php

$bdd = null;

// make $dbhost, ... not global
{
    $bddhost = 'localhost';
    $bddname = 'base_php_blog';
    $bdduser = 'root';
    $bddpassword = '';

    $bddconcat = 'mysql:host='.$bddhost.';dbname='.$bddname;

    $bdd = new PDO($bddconcat, $bdduser, $bddpassword);
}

return $bdd;