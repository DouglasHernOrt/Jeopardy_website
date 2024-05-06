<?php
$categories = array("HTML", "PHP", "Fun Facts", "Nerd Facts", "Random");

$questions = array(
    /* HTML QUESTIONS */
    array(
        "questions" => array(
            "What does HTML stand for?",
            "Which is a ordered list tag?",
            "What type of tag is br?",
            "What are void elements in HTML?",
            "Which is not a way you can display HTML elements?"
        ),
        "answers" => array(
            array("Hyper Things Markable Language", "Hypertime Mailing Language", "Hypertext Markup Language", "Hypertail Mark Language", "Hangtime Marking Language"),
            array("ul", "dl", "ol", "br", "/o"),
            array("A block tag", "A opening tag", "broken one", "A break tag", "A base one"),
            array("Elements which do not have closing tags or need them", "Elements that print void", "Elements that are thrown away", "Elements which do not need to be in any character", "Elements which need a closing tag"),
            array("inherit", "inline", "block", "flex", "grid")
        ),
        "correct" => array(2, 2, 3, 0, 0),
        "points" => array(100, 200, 300, 400, 500)
    ),
    /*PHP Questions*/
    array(
        "questions" => array(
            "What does PHP stand for?",
            "What code can PHP files NOT contain?",
            "What is NULL?",
            "Which data type is not used to construct variables?",
            "How can you compare objects in PHP?"
        ),
        "answers" => array(
            array("PHP, Hypervent Programming", "PHP, Hypertext Preprocessor", "Probability Hacking Process", "PHP, Hypertail Preprocessing", "PryingHypemanPlaying"),
            array("HTML", "Plack", "CSS", "Javascript", "PHP"),
            array("special data type with many arrays connected", "a special data type which can only have one value", "a special data which makes a space", "a special array that can produce numbers", "a special data type that gathers plenty of data"),
            array("Integers", "Booleans", "NULL", "Strings", "Reels"),
            array("using '=='", "using '!='", "using '=/'", "using '='", "using '=+'")
        ),
        "correct" => array(1, 1, 1, 4, 0),
        "points" => array(100, 200, 300, 400, 500)
    ),
    /**Fun Facts */
    array(
        "questions" => array(
            "What is the fear of spiders called", //arachnophobia
            "What US city hosted the 1994 World Cup final?", //Pasadena (California)
            "Which fast food restaurant still boards the slogan 'Have it your way'", //Burger King
            "What are the only birds that can fly backward?",//hummingbirds
            "What programming language was written by Google?"//go
        ),
        "answers" => array(
            array("zoophobia", "arachnophobia", "megalophobia", "cynophobia", "tripophobia"),
            array("New York City (New York)", "Seattle(Washington)", "Nashville (Tennessee)", "Los Angeles (California)", "Pasadena (California)"),
            array("McDonalds", "Wendy's", "Burger King", "Pizza Hut", "Arby's"),
            array("Hummingbirds", "Parrots", "Ravens", "Penguins", "Dove"),
            array("Gogg", "Go", "Ruby", "Cobol", "R")
        ),
        "correct" => array(1, 4, 2, 0, 1),
        "points" => array(100, 200, 300, 400, 500)
    ),
    /**Nerd Facts */
    array(
        "questions" => array(
            "In chess, what is the only piece that can jump over other pieces",
            "Michael Jordan joined the Looney Tunes crew for what 1996 film",
            "Who voiced lago in Aladdin?",
            "What is the famous American sitcom that featured a Superman reference in every episode.",
            "Which is the only planet in our solar system whose rotation is almost at a right angle to its orbit (i.e., it spins on its side)? "
            
        ),
        "answers" => array(
            array("The Queen", "The Rook", "The Knight", "The Bishop", "The Pawn"),
            array("Space Jam", "Jump In!", "Air", "What's Up, Doc", "Mickey Mouse Club House"),
            array("Robin Williams", "Scott Weinger", "Linda Larkin", "Gilbert Gottfried", "Lea Salonga"),
            array("Friends", "Seinfield", "The Office", "Brooklyn 99", "Golden Girls"),
            array("Earth","Jupiter","Mars","Venus","Uranus")
        ),
        "correct" => array(2, 0,3 , 1, 4),
        "points" => array(100, 200, 300, 400, 500)
    ),
    /**Random */
    array(
        "questions" => array(
            "What is the first programming language?",
            "Computer communicates how?",
            "How harmful were the first computer viruses?",
            "Computer codes had a pivotal role in ending what?",
            "What is CAPTCHA a well known example of?"
        ),
        "answers" => array(
            array("JAVA", "FORTAN", "RUBY", "Objective-C", "PYTHON"),
            array("through 0's and 1's", "through symbols", "through letters", "through text", "through science"),
            array("crashed the comp", "there were none", "slightly harmful", "very harmful", "not at all"),
            array("World War I", "A sentence", "World War II", "transcripts", "Cold War"),
            array("the Tumble Test", "a joke", "a symbol", "the Ruby Test", "the Turing Test")
        ),
        "correct" => array(1, 0, 4, 2, 4),
        "points" => array(100, 200, 300, 400, 500)
    )
);
?>