<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Jeopardy Leaderboard</title>
</head>
<body>
        <div class = "flex-container center">
       <div> <h1 class = "title2">Jeopardy Leaderboard</h1></div>
       
        <div class=" center">
            <?php
            // Read the profiles.txt file
            $profileFile = 'profiles.txt';
            $profiles = file($profileFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            // Create an array to store player names and scores
            $leaderboard = [];
            foreach ($profiles as $profile) {
                $userInfo = explode('|', $profile);
                $leaderboard[$userInfo[1]] = intval($userInfo[2]); // Username as key, score as value
            }

            // Sort the leaderboard by score in descending order
            arsort($leaderboard);

            // Display the leaderboard
            echo '<table class = "leaderboard center">';
            echo "
                <tr>
                <th>Rank</th>
                <th>Player</th>
                <th>Score</th>
                </tr>";
            $count = 0;
            foreach ($leaderboard as $username => $score) {
                $count++;
                echo 
                "<tr>
                    <td>$count</td>
                    <td >$username</td>
                    <td>$score</td>
                </tr>";
           }

            echo '</table>';
            ?>

            <br>
            
        </div>
        <div><button><a href="main.php">Back to Main Page</a></button></div>
        </div>
</body>
</html>