<?php
if (isset($_GET['id'])){
$id_link = $_GET['ID'];
}else{
    die("error not found");
}
?>

<html> 
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body> 


        <div class="container" style="max-width: 600px;">
            <br>
            <div class="card"> 
                <h2 class="card-header">Send a Massage</h2>
                <div class="card-body">
                    <ul> 
                        <li> nama_orang tidak akan tahu siapa pengirim pesan ini</li>
                        <li>Nyatakan perasaan mu sekarang</li>
                        <li>Ayo bersenang-senang di Secret Verse</li>
                    </ul>
                    <input class="form;control" placeholder="Tulis pesan mu disini">
                    <br> 
                    <br> 
                    <button class="btn btn-primary">Kirim Pesan</button>
                </div>
            </div>
        </div>
       
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>