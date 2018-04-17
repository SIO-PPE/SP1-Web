
    <body>
    
        <?php
        require_once('/PDO/connect_sql.php');
        require_once('/PDO/checklog.php');

   
       
        if (isset($_GET['numI']))     
    {
        $req = $bd->prepare('SELECT * FROM intervention where Numero_Intervention  = ?');
        $req->execute(array($_GET['numI']));
        ?>
          <?php 
        
   
         $result2 = array();
         while ($result = $req->fetch(PDO::FETCH_ASSOC))
         {
             $result2[] = $result;
         }
         
         echo '<form action="editIntervention.php" method="post">';
         foreach ($result2 as $key => $value)
         {

             foreach ($value as $key2 => $value2)
             {
                 
                 echo '<p> '.$key2.': <input type="text" name="'.$key2.'" value="'.$value2.'" /></p>';
             }
             
             
             ?>       <p><input type="submit" value="OK"></p>
          </form>
             
       <?php  }
       $req->closeCursor();
         echo '</table>';
         
    }else if (isset($_POST['Numero_Intervention']) AND isset($_POST['Date_Visite']) AND isset($_POST['Heure_Visite']) AND isset($_POST['MatriculeT']) AND isset($_POST['Numero_Client']) AND isset($_POST['Commentaire']) AND isset($_POST['Effectue'])){  // si le mot de passe est bon
        $numI = $_POST['Numero_Intervention'];
        try{   
            $req = $bd->prepare("UPDATE intervention SET Numero_Intervention= ? ,Date_Visite= ? ,Heure_Visite=?,MatriculeT=?,Numero_Client=?, 	Commentaire = ?, Effectue = ? WHERE Numero_Intervention = '$numI'");
        
        $req->execute(array($_POST['Numero_Intervention'],$_POST['Date_Visite'],$_POST['Heure_Visite'],$_POST['MatriculeT'],$_POST['Numero_Client'],$_POST['Commentaire'],$_POST['Effectue']));
        echo $req->rowCount() . " Intervention modifié avec succès";
        echo "<br><a href='index.php'>Retour menu</a>";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
        
    }
    else echo "erreur";
    
    $req->closeCursor();?>
               </div>    
    </body>
</html>