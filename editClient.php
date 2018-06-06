
    
        <?php
        require_once('/PDO/connect_sql.php');
        require_once('/PDO/checklog.php');

   
       
    if (isset($_GET['numC']))  
        
    {
        
        //affichage des informations du client
        $req = $bd->prepare('SELECT * FROM client where Numero_Client  = ?');
        $req->execute(array($_GET['numC']));
        ?>
          <?php 
        
   
         $result2 = array();
         while ($result = $req->fetch(PDO::FETCH_ASSOC))
         {
             $result2[] = $result;
         }
         
         echo '<form action="modificationClient.php" method="post">';
         foreach ($result2 as $key => $value)
         {

             foreach ($value as $key2 => $value2)
             {
                 
                 echo '<p> '.$key2.': <input type="text" name="'.$key2.'" value="'.$value2.'" /></p>';
             }
             
             
             ?>       <p><input type="submit" value="OK"></p>
          </form>
             
       <?php  }
         echo '</table>';
         
    }  $req->closeCursor();?>
                
    </body>
</html>