<?php include 'layout/header.php'; ?>
<?php include 'db/conn.php'; ?>

<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$sql = "SELECT unique_link FROM users WHERE user_id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$sql = "SELECT * FROM answers WHERE user_id='$user_id' ORDER BY time DESC";
$messages = $conn->query($sql);
?>

<header class="container bg-blue-950 text-white flex justify-center drop-shadow-sm">
    <div class="w-4/5 h-full flex justify-between items-center mt-4 mb-4">
        <div class="h-title flex text-2xl">
            <h3 class="text-sm">Secret</h3>
            <h3 class="text-white opacity-50 text-sm">Verse</h3>
        </div>
        <div class="flex">
            <h3 class="text-sm font-medium">Halo, <?php echo $username; ?><i class="bi bi-arrow-right-short font-bold"></i></h3>
            <div class="border ml-3 rounded-lg p-2">
                <a href="signout.php" class="hover:text-white hover:opacity-50">
                    <h3 class="text-sm font-medium ">Log out</h3>
                </a>
            </div>
        </div>
    </div>
</header>

<section id="main">
    <div class="container h-full min-h-screen w-full bg-blue-950 flex justify-center">
        <div class="card bg-white w-4/5 h-full min-h-full rounded-lg mt-7 p-7">
            <div class="flex flex-col justify-center items-center">
                <h3 class="text-center font-medium text-4xl text-blue-950">Pesan Masuk</h3>
                <hr class="m-3 w-full">
            </div>

            <div>
                <label for="link" class="block text-sm font-medium leading-6 text-gray-900">Your Link</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <input type="text" name="link" id="link" value="http://localhost/ngl-sv/send.php?user_id=<?php echo $user['unique_link']; ?>" readonly class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <button type="button" onclick="copyToClipboard()" class="absolute inset-y-0 right-0 flex items-center px-3 py-1.5 text-gray-900 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600">Copy</button>
                </div>
            </div>

            <?php if ($messages->num_rows > 0) : ?>
                <?php while ($message = $messages->fetch_assoc()) : ?>
                    <div class="w-full mt-4 p-3 flex justify-between items-center shadow-lg rounded-md">
                        <div>
                            <h3 class="font-bold">New Message</h4>
                                <p class="text-sm"><?php echo $message['time']; ?></p>
                        </div>
                        <div>
                            <a href="#" class="view-message" data-message="<?php echo htmlspecialchars($message['message']); ?>" data-toggle="modal" data-target="#messageModal">Lihat</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="w-full mt-4 text-center">
                    <h3>Tidak Ada Pesan</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modal-message-content"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var messageLinks = document.querySelectorAll('.view-message');
        messageLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                var message = this.getAttribute('data-message');
                document.getElementById('modal-message-content').textContent = message;
            });
        });
    });
</script>

<?php include 'layout/footer.php'; ?>