<?php
if (isset($_GET['id_link'])) {
    $_id_link = $_GET['id_link'];

    $database = file_get_contents("database/data.txt");
    $json_obj = json_decode($database);
    if (isset($json_obj->$id_link)){

        $id_pesan = "idpesan".uniqid();
        if(!($json_obj->$id_link->pesan == null)){
            echo "data sudah ada komentar sebelumnya";

        }else{
            echo "Data belum ada komentar sebelumnya";

            $json_obj->$id_link->pesan = [["id_pesan"=>"$id_pesan"]];
        }

    }else{
        echo json_encode(["status"=>false]);
    }

}else{
    echo json_encode(["status"=>false]);
}
