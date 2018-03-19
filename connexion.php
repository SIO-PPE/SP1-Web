<?php
session_start();
$titre="Connexion";
include("includes/debut.php");
require('PDO/dbUtils.php');
echo '<p><i>Vous êtes ici</i> : <a href="./index.php">Index </a> --> Connexion';
?>
<?php
echo '<h1>Connexion</h1>';
if ($matricule != 0) erreur(ERR_IS_CO);

if (!isset($_POST['nom'])) //On est dans la page de formulaire
{
    echo '<form method="post" action="connexion.php">
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
}
else
{
    $message='';
    if (empty($_POST['nom']) || empty($_POST['password']) ) //Oublie d'un champ
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

        if (($data['password']) == sha1($_POST['password'])) 
        {
            $_SESSION['nom'] = $data['nom'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['matricule'] = $data['matricule'];
            $message = '<p>Bienvenue '.$data['nom'].',
			vous êtes connecté!</p>
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