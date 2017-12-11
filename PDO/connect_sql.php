<?php
define('HOST',"localhost");
define('DBNAME',"ppe_mlge");
define('LOGIN',"root");
define('MDP',"");
$bd;
try
{
    $bd = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8",LOGIN,MDP);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}