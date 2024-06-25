<?php include 'layout/header.php' ?>

    <header class="container bg-blue-950 text-white flex justify-center drop-shadow-sm">
        <div class="w-4/5 h-full flex justify-between items-center mt-4 mb-4">
                <div class="h-title flex text-2xl">
                    <h3 class="text-sm">Secret</h3>
                    <h3 class="text-white opacity-50 text-sm">Verse</h3>
                </div>
                <div>
                    <a href="signin.php" class="hover:text-white hover:opacity-50">
                        <h3 class="text-sm font-medium">Masuk<i class="bi bi-arrow-right-short font-bold"></i></h3>
                    </a>
                </div>
            </div>
        </header>
        
        <section id="main">
            <div class="container h-full min-h-screen w-full bg-blue-950 flex flex-col justify-center items-center">
                <div class="w-4/5 text-center flex flex-col justify-center items-center">
                    <h1 class="text-white font-bold text-4xl m-4">Kirim pesan rahasia</h1>
                    <h4 class="text-white opacity-50 m-4">"Buat link dan share lalu dapatkan pesan rahasia dari semua orang."</h4>
                    <div class="bg-white w-max p-2 font-bold text-center text-blue-950 rounded-xl m-4 cursor-pointer hover:opacity-50">
                        <a href="signin.php">Create Here</a>
                    </div>
                </div>
            </div>
        </section>
        
<?php include 'layout/footer.php' ?>