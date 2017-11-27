<!DOCTYPE html>
<html>
    <head>
        <meta  http-equiv= "content-type" content= "text/html; charset=iso-8859-1" />
        
    </head>
    <body>
    
<?php
require_once('/PDO/connect_sql.php');
try
{
    $bdd = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8",LOGIN,MDP);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}/*
var_dump($_POST['Heure_Visite']); echo "<br>";
var_dump($_POST['Date_Visite']);echo "<br>";
echo ($_POST['Date_Visite']);echo "<br>";
echo ($_POST['Heure_Visite']);echo "<br>";
echo $_POST['numC'];echo "<br>";
echo $_POST['numT'];echo "<br>";*/

if (isset($_POST['numC']) AND isset($_POST['numT'])){
    $numC = $_POST['numC'];
    $matriculeT = $_POST['numT'];

    
     try{   $req = $bdd->prepare("INSERT intervention SET Date_Visite = ?, Heure_Visite = ? ,MatriculeT = ?,Numero_Client = ?");   
     $req->execute(array($_POST['Date_Visite'],$_POST['Heure_Visite'],$matriculeT,$numC));
     echo $req->rowCount() . " client modifié avec succès";
    
}

catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

}
else echo "erreur";

$req->closeCursor();
?>
                
    </body>
</html>