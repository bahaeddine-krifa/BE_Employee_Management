<?php

include("db_connect.php");

$response = array();

if( isset($_GET["email"]) && isset($_GET["password"]) )
{
    $email = $_GET["email"];
    $password = $_GET["password"];

    $req = mysqli_query($cnx," select * from user where email ='$email' AND password ='$password' ");

    if(mysqli_num_rows($req) > 0)
    {
        $tmp = array();

        $response["user"] = array();
        $cur = mysqli_fetch_array($req);

        $tmp["id"] = $cur["id"];
        $tmp["email"] = $cur["email"];
        $tmp["password"] = $cur["password"];

        array_push($response["user"],$tmp);

        $emailParts = explode("@", $cur["email"]);
        $username = $emailParts[0];

        $response["success"] = 1;
        $response["nom"] = $username;
        echo json_encode($response);
    }
    else{
        $response["success"] = 0;
        $response["message"] = "no data found";

        echo json_encode($response);
    }
    
}
else{
    $response["success"] = 0;
    $response["message"] = "required filed is missing";

    echo json_encode($response);

}


?>