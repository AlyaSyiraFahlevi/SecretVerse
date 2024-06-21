<?php include 'layout/header.php'; ?>
<?php include 'db/conn.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['user_id'])) {
        $user_link = $_GET['user_id'];

        // Dapatkan user_id dari link unik
        $sql = "SELECT user_id FROM users WHERE unique_link='$user_link'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];

            $message = $_POST['message'];
            $time = date('Y-m-d H:i:s');

            $stmt = $conn->prepare("INSERT INTO answers (user_id, message, time) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $user_id, $message, $time);

            if ($stmt->execute()) {
                header("Location: ./");
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Invalid user link.";
        }
    } else {
        echo "No user_id provided or incorrect request method.";
    }
}
?>

<header class="container bg-blue-950 text-white flex justify-center drop-shadow-sm">
    <!-- Header content here -->
</header>

<section id="main">
    <div class="container h-full min-h-screen w-full bg-blue-950 flex justify-center">
        <div class="card bg-white w-4/5 h-full min-h-full rounded-lg mt-7 p-7">
            <div class="flex flex-col justify-center items-center">
                <h3 class="text-center font-medium text-4xl text-blue-950">Kirim Pesan Rahasia</h3>
                <hr class="m-3 w-full">
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?user_id=" . $_GET['user_id']); ?>" method="post">
                <div>
                    <label for="message" class="block text-sm font-medium leading-6 text-gray-900">Tulis Pesan Anda Untuk User..</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <input type="text" name="message" id="message" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Tulis disini" required>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-2 py-1 font-medium text-sm text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php include 'layout/footer.php'; ?>
