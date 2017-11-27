<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        
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
}

if (isset($_POST['Numero_Client']) AND isset($_POST['Raison_Sociale']) AND isset($_POST['Code_Ape']) AND isset($_POST['Adresse']) AND isset($_POST['Telephone_Client']) AND isset($_POST['Fax_Client']) AND isset($_POST['Email']) AND isset($_POST['Duree_Deplacement']) AND isset($_POST['Distance_KM']) AND isset($_POST['Numero_de_contrat']) AND isset($_POST['Numero_Agence']) ){  // si le mot de passe est bon
    $numC = $_POST['Numero_Client'];
     try{   $req = $bdd->prepare("UPDATE client SET Numero_Client= ? ,Raison_Sociale= ? ,Code_Ape=?,Adresse=?,Telephone_Client=?,Fax_Client=?,Email=?,Duree_Deplacement=?,Distance_KM=?,Numero_de_contrat=?,Numero_Agence = ? WHERE Numero_Client = '$numC'");
     
        $req->execute(array($_POST['Numero_Client'],$_POST['Raison_Sociale'],$_POST['Code_Ape'],$_POST['Adresse'],$_POST['Telephone_Client'],$_POST['Fax_Client'],$_POST['Email'],$_POST['Duree_Deplacement'],$_POST['Distance_KM'],$_POST['Numero_de_contrat'],$_POST['Numero_Agence']));
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