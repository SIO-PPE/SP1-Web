
    <?php
require_once('/PDO/connect_sql.php');
require_once('/PDO/checklog.php')
?>
    <body>
<p>
	Numero Client
</p>

<form action="client.php" method="post">
<p>
<input type="number" required="required" name="numC" />
<input type="submit" value="Valider" />
</p>
</form>

<?php


$req = $bd->prepare('SELECT * FROM client');
        $req->execute();
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
             $numClient;
             foreach ($value as $key2 => $value2)
             {
      
                 echo '<td>'.$value2.'</td>';
                 if($key2 == 'Numero_Client'){
                     $numClient = $value2;
                 }
                 
             }
             
             
             ?><td>
             <form name="numC" action="Client.php" method="post">
              <input type="hidden" value="<?php echo$numClient?>" name="numC" />
				<input type="submit" value="Acceder"  >
			
			</form></td>
		
        <?php   }  $req->closeCursor();
        
        
        ?> 	</div>
 	</div>
                	</table>
                	</div>
    </body>
</html>       