
    
<?php
require_once('/PDO/connect_sql.php');
require_once('/PDO/checklog.php');

if (isset($_POST['numC']) AND isset($_POST['numT'])){
    $numC = $_POST['numC'];
    $matriculeT = $_POST['numT'];


    
  
    try{   
        $req = $bd->prepare("INSERT intervention SET Date_Visite = ?, Heure_Visite = ? ,MatriculeT = ?,Numero_Client = ?, Commentaire = '', Effectue = 0");   
     $req->execute(array(date($_POST['Date_Visite']),$_POST['Heure_Visite'],$matriculeT,$numC));
     echo $req->rowCount() . " intervention affecté avec succes  <br>";
     echo "pour ".$_POST['Date_Visite']." à ".$_POST['Heure_Visite'];
       
       
    $req = $bd->prepare('SELECT Numero_Intervention FROM intervention where Date_Visite = ? and  Heure_Visite = ? and MatriculeT = ? and Numero_Client = ?');
    $req->execute(array(date($_POST['Date_Visite']),$_POST['Heure_Visite'],$matriculeT,$numC));
     
/*
while ($donnees = $req->fetch())
{
    echo $donnees['Numero_Intervention'] . '<br />';
}*/
    $id = $req->fetch()[0];
    echo $id;
echo "<br><a href='/cashcash/pdf/interventation.php?numIntervention=".$id."'>Generer PDF</a>";
echo "<br><a href='index.php'>Retour menu</a>";
$req->closeCursor();


}

catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}


}
else echo "erreur";


?>
         </div>          
    </body>
</html>