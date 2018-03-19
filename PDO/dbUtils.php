<?php

include ("connect_sql.php");


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
    
    

    
    function encrypt($pure_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
        return $encrypted_string;
    }
    
    function decrypt($encrypted_string, $encryption_key) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
        return $decrypted_string;
    }
?>