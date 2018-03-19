<?php

session_start();
include("includes/debut.php");
if ($matricule == 0 ) {
    header('Location: index.php');
    exit();
}
?>