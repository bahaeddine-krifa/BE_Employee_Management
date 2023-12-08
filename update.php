<?php

include("db_connect.php");

$response = array();

if( isset($_GET["id"]) && isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["age"]) )
{
    $id = $_GET["id"];
    $name = $_GET["name"];
    $email = $_GET["email"];
    $age = $_GET["age"];

    $req = mysqli_query($cnx," update employee set name='$name' , email='$email' , age='$age' where id='$id' ");

    if($req)
    {
        $response["success"] = 1;
        $response["message"] = "updated successfuly";

        echo json_encode($response);
    }
    else
    {
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