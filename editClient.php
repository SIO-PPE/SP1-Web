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
        
   
       
        if (isset($_GET['numC']))  // Si le mot de passe est bon
    {
        $req = $bdd->prepare('SELECT * FROM client where Numero_Client  = ?');
        $req->execute(array($_GET['numC']));
        ?>
          <?php 
        
   
         $result2 = array();
         while ($result = $req->fetch(PDO::FETCH_ASSOC))
         {
             $result2[] = $result;
         }
         
         echo '<form action="editClient.php" method="post">';
         foreach ($result2 as $key => $value)
         {

             foreach ($value as $key2 => $value2)
             {
                 if($key2)
                 echo '<p> '.$key2.': <input type="text" name="'.$key2.'" value="'.$value2.'" /></p>';
             }
             
             
             ?>       <p><input type="submit" value="OK"></p>
          </form>
             
       <?php  }
         echo '</table>';
         
    }  $req->closeCursor();?>
                
    </body>
</html>