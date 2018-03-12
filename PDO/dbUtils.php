<?php

include ("connect_sql.php");

// = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8",LOGIN,MDP);


    function getRaisonClient($matricule,$bdd){
        
        $req = $bdd->prepare('SELECT nom FROM client where Numero_Client  = ?');
        $req->execute(array($matricule));
        $donnees=$req->fetch();
        return $donnees['Raison_Sociale'];
    }
    
    function getNomPrenomTec($matricule,$bdd){
        
        $req = $bdd->prepare('SELECT NomT,PrenomT FROM technicien where MatriculeT  = ?');
        $req->execute(array($matricule));
        $donnees=$req->fetch();
        return $donnees['NomT'].' '.$donnees['PrenomT'];
    }
    
    function getAllClient($matricule,$bdd){
        
        $req = $bdd->prepare('SELECT * FROM client where Numero_Client  = ?');
        $req->execute(array($matricule));
        $donnees=$req->fetch();
       // var_dump($donnees);
        return $donnees;
    }
    function getC(){
        
     //   $req = $bdd->prepare('SELECT * FROM client where Numero_Client  = ?');
       // $req->execute(array($matricule));
        //$donnees=$req->fetch();
        //var_dump($donnees);
        return "caca";
    }
?>