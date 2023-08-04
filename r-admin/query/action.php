<?php

if(isset($_POST['action'])){

    include("../../connection/db.php");

    $action = trim($_POST['action']);
    $respo = [];

    if($action == "addSection"){

        if(!isset($_POST['sectionName'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $sectionName = trim($_POST['sectionName']);

        if(empty($sectionName)){
            $respo['status'] = false;
            $respo['msg'] = "Section Name is required";
            echo json_encode($respo);
            die();
        }


        $checkQuery = mysqli_query($con,"SELECT id FROM sectioninfo WHERE sectionName='$sectionName'");
        if(mysqli_num_rows($checkQuery) > 0){
            $respo['status'] = false;
            $respo['msg'] = "Section Name alreasy exist.";
            echo json_encode($respo);
            die();
        }

        $insertQuery = mysqli_query($con,"INSERT INTO sectioninfo (sectionName) VALUES ('$sectionName')");
        if($insertQuery){
            $respo['status'] = true;
            $respo['msg'] = "Section Name successfully inserted.";           

        }else{

            $respo['status'] = true;
            $respo['msg'] = "Something went wrong, try again"; 
        }

        echo json_encode($respo);
        die();







    }//add Section close

    if($action == "getSectionList"){

        $getQuerySection = mysqli_query($con,"SELECT * FROM sectioninfo");
        if(mysqli_num_rows($getQuerySection) <= 0){
            $respo['status'] = true;
            $respo['msg'] = "Section list is empty.";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $data = [];
        while($sectionRun = mysqli_fetch_array($getQuerySection)){

            $obj = new stdClass();
            $obj->id = $sectionRun['id'];
            $obj->sectionName = $sectionRun['sectionName'];
            $data[] = $obj;

        }

        $respo['status'] = true;
        $respo['msg'] = "Section list found";
        $respo['data'] = $data;

        echo json_encode($respo);
        die();

    }

}else{

    $respo['status'] = false;
    $respo['msg'] = "Access Denied";
    echo json_encode($respo);
    die();
}


?>