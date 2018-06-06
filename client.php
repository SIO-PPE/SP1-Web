

        <?php
        require_once('/PDO/connect_sql.php');
        require_once('/PDO/checklog.php');
?>   <script>document.getElementById("cont").className = "";</script>   <?php
        
    if (isset($_POST['numC']) AND !empty($_POST['numC'])) //On v�rifie l'envoie du formulaire
    {
        //On affiche dans un tableau tout les Clients
        $req = $bd->prepare('SELECT * FROM client where Numero_Client  = ?');
        $req->execute(array($_POST['numC']));
        ?>
          <?php 
         $result2 = array();
         while ($result = $req->fetch(PDO::FETCH_ASSOC))
         {
             $result2[] = $result;
         }
         
         echo '<div class="row">';
         echo '<div class="col-md-6">';
        
         echo '<table class="table">';
         echo '<thead>';
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
   //On affiche les agences relative au Client
             $req = $bd->prepare('SELECT Numero_Agence FROM client where Numero_Client  = ?');
             $req->execute(array($_POST['numC']));
             
             $agence;
             while ($r = $req->fetch())
             {
                 $agence = $r[0];
             }
       
             
             
              }

              //On affiche les interventions en cours par rapport au client
       $req = $bd->prepare('SELECT * FROM intervention where Numero_Client = ?');
         $req->execute(array($_POST['numC']));
         
         $result2 = array();
         while ($result = $req->fetch(PDO::FETCH_ASSOC))
         {
             $result2[] = $result;
         }
         
         
         ?><td>
             <form name="postNumC" action="editClient.php?numC=<?php echo$_POST['numC']?>" method="post">
				<input class="btn btn-default" type="submit" value="Modifier"  >
			
			</form>
			<br>
             <form name="postAgence" action="visiteTec.php?numAgence=<?php echo$agence?> " method="post">
				<input class="btn btn-default" type="submit" value="AffecterVisite"  >
				<input type="hidden" value="<?php echo $_POST['numC']?>" name="numC" />
			
			</form>
             </td>
       <?php 
       echo '</table>     </div>
    		</div>';
         if(sizeof($result2) != '0'){        
             echo '<br /> <h1>Planning Intervention</h1>';
        
         echo '<table class="table">';
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
             
              
                 if($key2 == 'MatriculeT'){
                     $req = $bd->prepare('SELECT NomT FROM technicien where MatriculeT = ?');
                     $req->execute(array($value2));
                     $numI = $value2;
                     $value2 = '['.$value2.'].'.$req->fetch()[0];
                     echo '<td>'.$value2.'</td>';
                 }else    echo '<td>'.$value2.'</td>';
               //  var_dump($value);
             }      ?> 
             <td>
                <form  name="editI" action="editIntervention.php?numI=<?php echo $value['Numero_Intervention'];?>" method="post">
                 <input class="btn btn-default" type="submit" value="Modifier"  >
                 </form>
                </td>
                 
               <td> 
<a class="btn btn-success" href="/cashcash/pdf/interventation.php?numIntervention=<?php echo $value['Numero_Intervention'];?>">Générer PDF</a>

           </td>
                 
                
                 <?php 
                
             

            }
            echo ' </thead> </table>';
         }$req->closeCursor();
    }?>

               </div> 
    </body>
</html>