<?php
session_start();
include ("includes/debut.php");

if ($matricule == 0) {
    header('Location: connexion.php');
    exit();
}

?>
<div id="conteneur">

            <?php
            if ($role == "ASSISTANT")
                echo '  <div class="element"><a href="rechercheClient.php">Modifier Client</a></div>';
            echo '  <div class="element"><a href="tec.php">Technicien</a></div>';
            ?> 
              <div class="element"> <a href="intervention.php">Intervention</a></div>
               

</div>
</div>
</body>

</html>