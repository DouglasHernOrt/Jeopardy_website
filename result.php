<?php
session_start();

if (isset($_POST['a']) && isset($_POST['correct']) && isset($_POST['q'])) {
    $selectedAnswer = $_POST['a'];
    $correctAnswer = $_POST['correct'];
    $q = $_POST['q'];

    $category = floor($q / 10);
    $value = ($q % 10) - 1;

    include 'questions.php';

    $question = $questions[$category]["questions"][$value];
    $selectedAnswerText = $questions[$category]["answers"][$value][$selectedAnswer];
    $correctAnswerText = $questions[$category]["answers"][$value][$correctAnswer];

    $isCorrect = $selectedAnswer == $correctAnswer;

    // Adds point to current player turn
    if($isCorrect) {
        $_SESSION['players'][$_SESSION['turn']] += $questions[$category]['points'][$value];
    }

    // Goes to next turn
    function getNextTurn($inputKey) {
        $keys = array_keys($_SESSION['players']);
        $values = array_values($_SESSION['players']);

        $index = array_search($inputKey, $keys);

        if ($index !== false && isset($keys[$index + 1])) {
            return $keys[$index + 1];
        } else {
            return null;
        }
    }

    $nextKey = getNextTurn($_SESSION['turn']);
    $nextTurn = $nextKey == null ? $_SESSION['first-turn'] : $nextKey;
    $_SESSION['turn'] = $nextTurn;

    // Store whether the answer is correct in the session
    $_SESSION['correct'][$q] = $isCorrect;
} else {
    // Redirect to the main page if the data is not set
    header("Location: main.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Jeopardy Result</title>
</head>
<body>
    <div class="container">
        <h3>Jeopardy Result...</h3>
        <div class="result">
            <?php
            if ($isCorrect) {
                echo '<h1 class="correct">Correct!</h1>';
            } else {
                echo '<h1 class="wrong">Wrong!</h1>';
            }
            ?>

            <p>Question: <?php echo $question; ?></p>
            <p>Your answer: <?php echo $selectedAnswerText; ?></p>
            <p>Correct answer: <?php echo $correctAnswerText; ?></p>
            
            <a href="index.php">Back to Board</a>
			<br>
			<?php 
			if (isset($_SESSION['selectedQuestions'])){
				//check if selectedQuestion variable is set
				$selectedQuestions = isset($_POST['selectedQuestions'])? $_POST['selectedQuestions'] : $_SESSION['selectedQuestions'];

				//debug print statement to track number of answered questions
				//echo "Number of Answered Questions: " . $selectedQuestions;

				//increment num of questions answered by 1
				//$selectedQuestions++;

				//update value
				$_SESSION['selectedQuestions'] = $selectedQuestions;

				//once all questions have been answered go to leaderboard page
				// if($selectedQuestions == 5){
				// 	//header("Location: win.php?points=$finalPoints" );
				// 	//exit();
				// }
                // else{
                //     echo "Number of Selected Questions:" . $selectedQuestions ;
                // }
			}
			?>
			<br>

        </div>
    </div>
</body>
</html>