<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playerCount = isset($_POST['player-count']) ? $_POST['player-count'] : 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Input Player Names:</h1>
        <form action="process_profile.php" method="post">

            <!-- Hidden field to send player count -->
            <input type="hidden" name="player-count" value="<?= $playerCount ?>">

            <!-- Input fields for usernames -->
            <?php 
            for ($i = 0; $i < $playerCount; $i++) {
                echo "<label for='username$i'>Player " . ($i + 1) . ": ";
                echo "<input type='text' id='username$i' name='usernames[]' required />";
                echo "<br>";
            }
            ?>

            <button type="submit">To Rules</button>
        </form>
        <br>
        <a href="main.php">Back to Home</a>
    </div>
</body>
</html>

<?php
} else {
    header("Location: main.php");
    exit();
}
?>