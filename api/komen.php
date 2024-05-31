<?php
header("Content-Type: application/json");

if (isset($_POST['id_link'])) {

    $_id_link = $_POST['id_link'];
    $pesan = $_POST['pesan'];
    $database = file_get_contents("database/data.txt");
    $json_obj = json_decode($database);
    if (isset($json_obj->$id_link)){
        $waktu = date("h:i:sa");
        $id_pesan = "idpesan".uniqid();
        if(!($json_obj->$id_link->pesan == null)){
            echo "data sudah ada komentar sebelumnya";
            
            $json_obj ->$id_link->pesan->$id_pesan = ["pesan"=>"$_pesan","waktu"=>"$_waktu"];
        }else{
            echo "Data belum ada komentar sebelumnya";

            $json_obj->$id_link->pesan = ["$id_pesan"=>"pesan"=>"$_pesan","waktu"=>"$_waktu"];
        }

        file_put_contents("database/data.txt",json_encode($_json_obj,JSON_PRETTY_PRINT));

        
    }else{
        echo json_encode(["status"=>false]);
    }

}else{
    echo json_encode(["status"=>false]);
}
