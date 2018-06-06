<?php
session_start();
$titre="Connexion";
include("includes/debut.php");
require('PDO/dbUtils.php');
?> 
       
   
<?php

if ($matricule != 0) erreur(ERR_IS_CO); //Si un utilisateur est d�ja connect�

if (!isset($_POST['nom'])) //Si le formulaire n'a pas d�ja �t� remplie on affiche le formulaire
{
/*
 *     echo '<form method="post" action="connexion.php">
	<fieldset>
	<legend>Connexion</legend>
	<p>
	<label for="nom">Nom :</label><input name="nom" type="text" id="nom" /><br />
	<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
	</p>
	</fieldset>
	<p><input type="submit" value="Connexion" /></p></form>
	</div>
	</body>
	</html>';
 */
?>
<fieldset>
	<legend>Identifiez-vous</legend>
<form class="form-signin" action="connexion.php" method="post">

<label for="nom" class="sr-only">Nom</label>
      <input type="text" id="nom" class="form-control" placeholder="Nom" name ="nom" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password"  required>

<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
</form>
 	</fieldset>
<?php 
}
else //Lors de la connexion
{
    $message='';
    if (empty($_POST['nom']) || empty($_POST['password']) ) //V�rification des champs nom et password
    {
        $message = '<p>
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $query=$bd->prepare('SELECT matricule,nom,role,password
        FROM user WHERE nom = :nom');
        $query->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
    //verification du mdp entré
        if (($data['password']) == sha1($_POST['password'])) 
        {
            $_SESSION['nom'] = $data['nom'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['matricule'] = $data['matricule'];
            $message = '<p>Bienvenue '.$data['nom'].',
			vous êtes connecté !</p>
			<p>Cliquez <a href="./index.php">ici</a>
			pour revenir à la page d accueil</p>';
        
        }
        else // Acces pas OK !
        {
            $message = '<p>Une erreur s\'est produite.<br /> Le mot de passe ou le pseudo
            entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a>
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a href="./index.php">ici</a>
	    pour revenir à la page d accueil</p>';
        }
        $query->CloseCursor();
    }
    echo $message.'</div></body></html>';
    
}
?>   
    </body>
</html>