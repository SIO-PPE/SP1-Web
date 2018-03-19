
    <body>
    
        <?php
        require_once('/PDO/connect_sql.php');
        require_once('/PDO/checklog.php');

        
    if (isset($_POST['numC']) AND !empty($_POST['numC'])) // Si le mot de passe est bon
    {
        $req = $bd->prepare('SELECT * FROM client where Numero_Client  = ?');
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
   
             $req = $bd->prepare('SELECT Numero_Agence FROM client where Numero_Client  = ?');
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

       $req = $bd->prepare('SELECT * FROM intervention where Numero_Client = ?');
         $req->execute(array($_POST['numC']));
         
         $result2 = array();
         while ($result = $req->fetch(PDO::FETCH_ASSOC))
         {
             $result2[] = $result;
         }
         if(sizeof($result2) != '0'){
             
            
             
             echo '</table>';
             echo '<br /> <h1>Planning Intervention</h1>';
        
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
             
              
                 if($key2 == 'MatriculeT'){
                     $req = $bd->prepare('SELECT NomT FROM technicien where MatriculeT = ?');
                     $req->execute(array($value2));
                     $value2 = '['.$value2.'].'.$req->fetch()[0];
                     echo '<td>'.$value2.'</td>';
                 }else    echo '<td>'.$value2.'</td>';
                 
             }
             

            }
         }$req->closeCursor();
    }?>
                
    </body>
</html>