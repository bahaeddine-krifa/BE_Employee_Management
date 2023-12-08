<?php

include("db_connect.php");

$response = array();

if( isset($_GET["email"]) && isset($_GET["password"]) )
{
    $email = $_GET["email"];
    $password = $_GET["password"];

    $req = mysqli_query($cnx, " insert into user(email,password) values ( '$email', '$password') ");

    if($req)
    {
        $response["success"] = 1;
        $response["message"] = "inserted";

        echo json_encode($response);
    }
    else{
        $response["success"] = 0;
        $response["message"] = "request error";

        echo json_encode($response);
    }

}
else{
    $response["success"] = 0;
    $response["message"] = "required filed is missing";

    echo json_encode($response);
}




?>