<?php 
//MySQli
$conn = mysqli_connect('localhost','root','','mesabos');
// verification de la connexion

if (!$conn) {
    echo 'Erreur de connexion : ' . mysqli_connect_error();
}


?>