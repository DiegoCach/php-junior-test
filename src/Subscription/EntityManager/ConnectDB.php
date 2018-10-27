<?php 
// Parameters for connecting to the Data Base

$hostBD = "mysql.database.es";  
$dateBase = "wp_unknown_followers"; 

$userBD = "admin";
$passBD = "admin";

// Connection to the database 
$BD_Connection = mysqli_connect("$hostBD","$userBD","$passBD", "$dateBase") 

    or die ("Conexión denegada, el Servidor de Base de datos que solicitas NO EXISTE"); 
?> 