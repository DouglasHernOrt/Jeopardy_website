<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeopardy Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class = "title">Welcome to Jeopardy!</h1>
        <p>Please enter number of players!</p>

        <form action='./create_profile.php' method='post'>

            <label for='player-count'>Player count:</label>
            <input type='number' id='player-count' name='player-count' min='2' max='4' required>
            <br>
            <button type='submit'>Enter</button>
        </form>
        <br>
        <button type="submit"><a href="leaderboard.php">Leaderboards</a></button>
    </div>
</body>
</html>

<?php
$file = fopen("current_leaderboard.txt",'w');
ftruncate("current_leaderboard.txt",0);
fclose($file);
?>