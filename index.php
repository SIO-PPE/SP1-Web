<?php
session_start();
include ("includes/debut.php");

if ($matricule == 0) {
    header('Location: connexion.php');
    exit();
}


if ($role == "ASSISTANT"){ ?>
    <div class="page-header">
    <h1>Bienvenue</h1>
    </div>
    <div class="well">
    <p>Vous �tes connect� sur l'interface de gestion de CashCash en tant qu'assistant.</p>
    <p>Vous pouvez donc : <p>
    <ul>
    <li>Affecter les visites aux techniciens.</li> 
    <li>Visualiser ou modifier les fiches clients.</li> 
    <li>G�nerer des fiches d'interventions au format PDF.</li> 
    <li>Consulter les interventions et obtenir les statistiques des techniciens.</li> 
    </ul>
      </div>  
    <?php 
}else {
    ?>
    
        <div class="page-header">
    <h1>Bienvenue</h1>
    </div>
    <div class="well">
        <p>Vous �tes connect� sur l'interface de gestion de CashCash en tant que technicien.</p>
    <p>Vous pouvez donc : <p>
    <ul>
    <li>Consulter vos interventions</li> 
    <li>Valider une intervention.</li> 
    
    </ul>
    
      </div> 
     <?php 
}
    
    



?>
   

</div>

</body>

</html>