

    
        <?php
        require_once ('/PDO/connect_sql.php');
        require_once('/PDO/checklog.php');
     

        
        if (isset($_GET['numAgence'])) // Si le mot de passe est bon
        {
            $req = $bd->prepare('SELECT * FROM technicien Where Numero_Agence = ?');
            $req->execute(array($_GET['numAgence']));
            $result2 = array();
            while ($result = $req->fetch(PDO::FETCH_ASSOC))
            {
                $result2[] = $result;
            }
            
            foreach ($result2 as $key => $value)
            {
                echo '<div class="row">';
                echo '<div class="col-md-6">';
                
                echo '<table class="table">';
                echo '<thead>';
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
                
                
                echo ' </thead></table></div>  </div>  ';
            
                ?>
   
            <form name="date" action="visiteClient.php" method="post">
					<input type="date" name="Date_Visite" >
					<input type="time" name="Heure_Visite">
					
					<input type="hidden" value=<?php echo $value['MatriculeT']?> name="numT">
					<input type="hidden" value="<?php echo $_POST['numC']?>" name="numC">
					<input type="submit" value="Affecter Visite"  >
			</form>
			<br>
       <?php } 
         
       if(sizeof($result2) == '0'){
                       
         echo 'Aucun technicien dans cette agence';
       }
         $req->closeCursor();
        }
        
        ?>
   
             </div>      
    </body>
</html>