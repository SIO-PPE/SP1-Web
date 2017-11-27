<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
    
        <?php
        require_once('/PDO/connect_sql.php');
        try
        {
            $bdd = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8",LOGIN,MDP);
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        if (!$mysqli->query("SET @msg = ''") || !$mysqli->query("CALL p(@msg)")) {
            echo "Echec de l'appel à la procédure stockée : (" . $mysqli->errno . ") " . $mysqli->error;
        }
        
        if (!($res = $mysqli->query("SELECT @msg as _p_out"))) {
            echo "Echec lors de la récupération : (" . $mysqli->errno . ") " . $mysqli->error;
        }
        
        $row = $res->fetch_assoc();
        echo $row['_p_out'];
        ?>
                
    </body>
</html>