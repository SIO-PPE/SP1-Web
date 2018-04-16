
    
        <?php
        require_once('/PDO/connect_sql.php');
        require_once('/PDO/checklog.php');

             
?>
<p>
	Numero Agent
</p>
<form action="intervention.php" method="post">
<p>
<input type="number" name="numT" />
<input type="date" name="trier"><br>
<input type="submit" value="Valider" />
</p>
</form>    

<script>document.getElementById("cont").className = "";</script>

  <?php

if($role == "TECHNICIEN"){
    $req = $bd->prepare('SELECT * FROM intervention,client where MatriculeT = ? and intervention.Numero_Client = client.Numero_Client ORDER BY client.Distance_KM ASC ');
    $req->execute(array($matricule));
}

else if (isset($_POST['numT']) AND !empty($_POST['numT']))
{
       $req = $bd->prepare('SELECT * FROM intervention where MatriculeT = ? ');
       $req->execute(array($_POST['numT']));
       echo $_POST['numT'];
}else if (isset($_POST['trier']) AND !empty($_POST['trier'])) {
    $req = $bd->prepare('SELECT * FROM intervention where Date_Visite = ?');
    $req->execute(array($_POST['trier']));
}
else{
    $req = $bd->prepare('SELECT * FROM intervention ');
    $req->execute();
}
         $result2 = array();
         while ($result = $req->fetch(PDO::FETCH_ASSOC))
         {
             $result2[] = $result;
         }
             
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
            
             }      ?> <td>
                 <form name="editI" action="editIntervention.php?numI=<?php echo $value['Numero_Intervention'];?>" method="post">
                 <input type="submit" value="Modifier"  >
                 
                 <td>
                 
             
<button><a href="/cashcash/pdf/interventation.php?numIntervention=<?php echo $value['Numero_Intervention'];?>">Generer PDF</a></button>

         
                 
                 </td>
                 <?php 
                
             

         } $req->closeCursor();
            echo ' </thead> </table>';
        
    ?>

               </div> 
    </body>
</html>