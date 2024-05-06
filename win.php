<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Jeopardy Win Screen</title>
</head>
<body>
    <div class="container">
        <h1>Game Set!</h1>
        <div class="result">
            <?php
            session_start();

            include 'questions.php';

            // Function to calculate total points
            function calculateTotalPoints($questions, $clicked) {
                $totalPoints = 0;

                foreach ($clicked as $questionNumber => $clickedValue) {
                    if ($clickedValue) {
                        $categoryIndex = floor($questionNumber / 10);
                        $questionIndex = ($questionNumber % 10) - 1;

                        // Check if the question was answered correctly
                        if (isset($_SESSION['correct'][$questionNumber]) && $_SESSION['correct'][$questionNumber]) {
                            $totalPoints += $questions[$categoryIndex]["points"][$questionIndex];
                        }
                    }
                }

                return $totalPoints;
            }

            $totalPoints = calculateTotalPoints($questions, $_SESSION['clicked']);
            echo '<h2>Total Points: ' . $totalPoints . '</h2>';

            // Read profiles.txt file
           // $profileFile = 'profiles.txt';
           $profileFile = 'current_leaderboard.txt';
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

            <p>Thank you for playing!</p>
            <button><a href="reset_board.php">Global Leaderboard</a></button>
            <button><a href="reset_board.php">Play Again</a></button>
            <?php 
            $file = fopen("current_leaderboard.txt",'w');
            ftruncate("current_leaderboard.txt",0);
            fclose($file);
            ?>
           
        </div>
    </div>
</body>
</html>
