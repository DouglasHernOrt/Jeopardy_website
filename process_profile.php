<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Game Rules</title>
		<link rel="stylesheet" href="style.css">
	</head>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playerCount = isset($_POST['player-count']) ? $_POST['player-count'] : 1;
    $usernames = isset($_POST['usernames']) ? $_POST['usernames'] : [];

    // Save user profile to both text files file
    //$file = fopen("current_leaderboard.txt",'w');
    $profileFile = 'current_leaderboard.txt';
    $existingProfiles = file($profileFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $profileFile2 = 'profiles.txt';
    $existingProfiles2 = file($profileFile2, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($usernames as $username) {
        $profileData = "1|$username|0"; // Assuming 0 is the default score and player number is 1
        $existingProfiles[] = $profileData;
        $existingProfiles2[] = $profileData;
    }

    file_put_contents($profileFile, implode("\n", $existingProfiles));
    file_put_contents($profileFile2, implode("\n", $existingProfiles2));

    // Set the session variable
    $_SESSION['username'] = $usernames[0];

    echo '<div class = "flex-container center">';
    // Display the inputted usernames
    //echo '<h1>Profiles Created!</h1>';
    echo '<h2>Players:</h2>';
    foreach ($usernames as $username) {
        echo "<h3>$username</h3>";
    }

    echo '<h1 class = "title"> RULES </h1>';
    echo '<p>1. Answer multiple-choice questions until all questions have been answered </p>';
    echo '<p>2. Total points will be counted at the end and be used in the leaderboard </p>';
    echo '<p>3. Questions can only be answered once and cannot be chosen again </p>';
    echo "<form method='post' action='./index.php'>";
    foreach ($usernames as $username) {
        echo "<input type='hidden' name='username[]' required value='$username' />";
    }
    echo "<button type='submit'>Start game</button>";
    echo '</div>';
    echo '</form>';
} else {
    header("Location: main.php");
    exit();
}
?>
</html>
