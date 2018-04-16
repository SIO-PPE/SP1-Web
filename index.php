<?php 
session_start();
include("includes/debut.php");


if ($matricule == 0 ) {
    header('Location: connexion.php');
    exit();
}


if($role == "ASSISTANT")
    echo '<a href="rechercheClient.php">Modifier Client</a>';
    echo '<a href="tec.php">Technicien</a>';
?> 
   
     <a href="intervention.php">Intervention</a>
    <a href="/">Affecter les visites a un tec</a>
      </div>
    </body>

</html>