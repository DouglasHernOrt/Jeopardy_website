<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
	//geting variables from the jeopardy.php
        $question = $_GET['question'];
        $currPlayer = $_GET['currPlayer'];
        $currTurn = $_GET['currTurn'];
        $currPoints = $_GET['currPoints'];
        $answers = $_GET['answers'];
        $firstAns = $_GET['firstAns'];
        $secAns = $_GET['secAns'];
        $thirdAns = $_GET['thirdAns'];
        $fourthAns = $_GET['fourthAns'];
        $fifthAns = $_GET['fifthAns'];
        $initial_time = $_GET['initial_time'];
        $categories = $_GET['categories'];
        $category = $_GET['category'];
        $cat = $_GET['cat'];
        $correctIndex = $_GET['correctIndex'];
        $q = $_GET['q'];

		//check if selected question variable has been set and initialize it to 1 if not
		session_start();
		if(!isset($_SESSION['selectedQuestions'])){
			$_SESSION['selectedQuestions'] = 1;
		}

    ?>
    <div class="container">
        <div class="total-points">
            <?php
           // echo "<h2> $currPlayer : $currPoints</h2>";
            echo '<h2>Current turn: ' . $currTurn . '</h2>';
            ?>
        </div>
        <?php
        echo '<div class="question">';
        echo '<h2>' . $cat . '</h2>';
        echo '<p>' . $question . '</p>';

        echo '<form method="post" action="result.php">';

        echo '<button type="submit" name="a" value="0" class="answer-button">' . $firstAns . '</button>';
        echo '<button type="submit" name="a" value="1" class="answer-button">' . $secAns . '</button>';
        echo '<button type="submit" name="a" value="2" class="answer-button">' . $thirdAns . '</button>';
        echo '<button type="submit" name="a" value="3" class="answer-button">' . $fourthAns . '</button>';
        echo '<button type="submit" name="a" value="4" class="answer-button">' . $fifthAns . '</button>';


        echo '<input type="hidden" name="correct" value="' . $correctIndex . '">';
        echo '<input type="hidden" name="q" value="' . $q . '">';

		//this is how we transfer the selectedQuestion variable to the result php
		echo '<input type="hidden" name="selectedQuestions" value ="' . $_SESSION['selectedQuestions'] . '">';
        echo '</form>';

        echo '</div>';
        ?>
        <?php

        // Calculate the time remaining
        $time_remaining = $initial_time - time();

        if($time_remaining==0){
            //Redirect to results
            header("Location: index.php");
        }

        // Convert the remaining time to minutes and seconds
        $minutes = floor($time_remaining / 60);
        $seconds = $time_remaining % 60;

        echo'<p>Time remaining: '.$minutes.' minutes '.$seconds.' seconds</p>';
        ?>
        <br><br>
        <a href="reset_board.php">Reset Board</a>
    </div>
</body>
</html>