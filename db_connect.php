<?php

$cnx = mysqli_connect("localhost","root","");
if(!$cnx)
{
    echo "erreur de connexion au serveur";
}

$db = mysqli_select_db($cnx,"employeemanager");
if(!$db)
{
    echo "erreur de connexion à la base";
}




?>