<?php

$servername = 'localhost';
$username = 'login4419';
$password = 'CdtXHdfcstRoEEC';
$conn = new mysqli($servername, $username, $password);
            
if($conn->connect_error){
    die('Erreur : ' .$conn->connect_error);
}
echo 'Connexion réussie';
?>