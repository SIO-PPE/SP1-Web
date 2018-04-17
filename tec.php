
    <?php
require_once('/PDO/connect_sql.php');
require_once('/PDO/checklog.php')
?>
    <body>
<p>
	Numero Client
</p>

<form action="tec.php" method="post">
<p>
<input type="number"  name="numC" />
<input type="date" name="trier"><br>
<input type="submit" value="Valider" />
</p>
</form>

<?php

/* afficher le nombre d'intervention
 * SELECT technicien.MatriculeT, count(*) as nbIntervention FROM technicien,intervention WHERE technicien.MatriculeT = 3 and MONTH(intervention.Date_Visite) = 4
group by intervention.MatriculeT having intervention.MatriculeT = technicien.MatriculeT 
 */
$req = $bd->prepare('SELECT * FROM technicien');
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
             if (isset($_POST['trier']) AND !empty($_POST['trier'])){
             echo "<th>Nombre d'intervention</th>";
             echo "<th>KM parcourue</th>";
             echo "<th>Duree Controle</th>";
             }             
             echo '</tr>';
             
             $numT;
             foreach ($value as $key2 => $value2)
             {
      
                 echo '<td>'.$value2.'</td>';
                 if($key2 == 'MatriculeT'){
                     $numT = $value2;
                 }
                 
             }
             
            
              
             if (isset($_POST['trier']) AND !empty($_POST['trier'])){
                 $req = $bd->prepare('SELECT technicien.MatriculeT, count(*) as nbIntervention FROM technicien,intervention WHERE technicien.MatriculeT = ? and MONTH(intervention.Date_Visite) = ?
group by intervention.MatriculeT having intervention.MatriculeT = technicien.MatriculeT ');
                 $req->execute(array($numT,date("m",strtotime($_POST['trier']))));
                 echo '<td>'.$req->fetch()[1].'</td>';
                 
                 $req = $bd->prepare('SELECT sum(Distance_KM) FROM client,intervention where intervention.MatriculeT = ? and intervention.Numero_Client = client.Numero_Client and MONTH(intervention.Date_Visite) = ? ');
                 $req->execute(array($numT,date("m",strtotime($_POST['trier']))));
                 echo '<td>'.$req->fetch()[0].'</td>';
                 
                 $req = $bd->prepare('SELECT sum(Duree_Deplacement) FROM client,intervention where intervention.MatriculeT = ? and intervention.Numero_Client = client.Numero_Client and MONTH(intervention.Date_Visite) = ?');
                 $req->execute(array($numT,date("m",strtotime($_POST['trier']))));
                 echo '<td>'.$req->fetch()[0].'</td>';
             }
         
             ?>
		
        <?php  }  $req->closeCursor();
        
        
        ?> 	</div>
 	</div>
                	</table>
                	</div>
    </body>
</html>       