<?php

include("db_connect.php");

$response = array();

if( isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["age"]) )
{
    $name = $_GET["name"];
    $email = $_GET["email"];
    $age = $_GET["age"];

    $req = mysqli_query($cnx, " insert into employee(name,email,age) values ('$name', '$email', '$age') ");

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