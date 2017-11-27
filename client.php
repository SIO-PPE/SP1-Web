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
        
    if (isset($_POST['numC']) AND !empty($_POST['numC'])) // Si le mot de passe est bon
    {
        $req = $bdd->prepare('SELECT * FROM client where Numero_Client  = ?');
        $req->execute(array($_POST['numC']));
        ?>
          <?php 
         $result2 = array();
         while ($result = $req->fetch(PDO::FETCH_ASSOC))
         {
             $result2[] = $result;
         }
         echo '<table border = 1>';
         foreach ($result2 as $key => $value)
         {
             echo '<tr>';
             foreach ($value as $key2 => $value2)
             {
                 echo '<th>'.$key2.'</th>';
             }
         
             echo '</tr>';
             foreach ($value as $key2 => $value2)
             {
                 echo '<td>'.$value2.'</td>';
             }
             $req = $bdd->prepare('SELECT Numero_Agence FROM client where Numero_Client  = ?');
             $req->execute(array($_POST['numC']));
             
             $agence;
             while ($r = $req->fetch())
             {
                 $agence = $r[0];
             }
       
             ?><td>
             <form name="postNumC" action="editClient.php?numC=<?php echo$_POST['numC']?>" method="post">
				<input type="submit" value="Modifier"  >
			
			</form></td>
			<td>
             <form name="postAgence" action="visiteTec.php?numAgence=<?php echo$agence?> " method="post">
				<input type="submit" value="AffecterVisite"  >
				<input type="hidden" value="<?php echo $_POST['numC']?>" name="numC" />
			
			</form></td>
             
       <?php  }
         echo '</table>';
         echo '<br />'.sizeof($result2).' lignes.';
         
    }$req->closeCursor();?>
                
    </body>
</html>