<?php
header("Content-Type: application/json");

if (isset($_POST['id_link'])) {
    $_id_link = $_POST['id_link'];

    $database = file_get_contents("database/data.txt");
    $json_obj = json_decode($database);
    if (isset($json_obj->$id_link)){
        $json_obj->$id_link->status = true;
            echo json_encode($json_obj ->$id,JSON_PRETTY_PRINT);

        }else{
            echo json_encode(["status"=>false]);
        }

    }else{
        echo json_encode(["status"=>false]);
}
