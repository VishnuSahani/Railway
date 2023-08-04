<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

$request = json_decode(file_get_contents("php://input"), true);

// print_r($data);

if (isset($request['action'])) {

    include("../connection/db.php");

    $action = $request['action'];

    if ($action == "adminLogin") {

        if (isset($request['adminId']) && isset($request['adminPassword'])) {
            try {

                $adminId = trim($request['adminId']);
                $adminPassword = trim($request['adminPassword']);

                $query1 = mysqli_query($con,"SELECT id FROM admininfo WHERE adminId='$adminId' && adminPassword='$adminPassword'");

                $respo = [];
                if(mysqli_num_rows($query1) > 0){

                    $respo['status'] = true;
                    $respo['msg'] = "Admin validated";
                    session_start();
                    $_SESSION['superAdminId'] = $adminId;


                }else{

                    $respo['status'] = false;
                    $respo['msg'] = "Either Admin Id or Password are wrong";

                }


                echo json_encode($respo);
                die();
               
            } // try
            catch (Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }

        } else {
            echo "request body error";
        }



    }





} else {
    echo "Access denied...";
}


?>