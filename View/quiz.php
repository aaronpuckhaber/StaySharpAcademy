<?php   // use the questions model to pull the specific questions based on the user's inputs from the explore page
        // the question's model gives this page access to the $question array generated
        require '../model/question.php';

        // include the header
        include 'header_view.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Stay Sharp --> Quiz</title>
    </head>
    <body>
        <div class="container pt-3 pb-3">
        <h1 class="pt-3">Questions</h1>

        <?php 
            // set the number of questions per quiz
            // NOTE: the results page is only set up to process 5 questions (a brute force and static solution)
            // NOTE: if you chage the $quiz_length to be more than 5 you will have to update results.php
            $quiz_length = 5;

            // shuffle the $question array received from question.php 
            // so the quiz questions are random from the total population of questions
            shuffle($question); ?>

            <!-- send the user to the results.php with question, answer, and response values via POST -->
            <form action="results.php" method="post">

            <?php
                // this for loop will generate the quiz's questions one at a time along with four possible answers
                for ($i = 0; $i < $quiz_length; $i++){ ?>
                    <p>
                    <?php
                    // show the quiz's question number and each question one at a time
                    echo ($i+1) . ")  ". $question[$i]['question']; ?>
                    </p>
                    <?php
                    // this array will hold the one correct and three incorrect answers for the radio dials
                    // this array is inside the for loop as it needs to be emptied every time through to get
                    // the next question's correct answer and three new incorrect answers 
                    $a = array();

                    // each question's correct answer is added to the array used by the radio dials
                    array_push($a, $question[$i]['answer']);

                    // NEXT: create the alternative answers to each question

                    // count the number of total questions returned by the question.php model
                    // the number of questions is driven by the user's parameters selected on the explore.php page
                    // this count number of $items will be used to create alternative wrong answers 
                    $items = count($question);

                    // using the number of $items in the $question array we can set the range quantity
                    // The range() function creates an array containing a range of elements
                    $mix = range(0,$items-1);    

                    // the while loop will add alternative answers for each question
                    // recall, the correct answer was already added to the $a array
                    // thus, on the loops onset, the count value is already 1
                    // because we want four choices the while loop is to populate the $a array with 4 additional wrong answers
                    while (count($a) < 5){
                        // The shuffle() function randomizes the order of the elements in the array.
                        // Here the values in the range stored in the $mix array is shuffled
                        // we shuffle the mix every time through the while loop
                        shuffle($mix);

                        // using the full $question array returned from the model
                        // access the index number per the random values in $mix 
                        // pull the answer from a random question 
                        $random_answer = $question[$mix[$i]]['answer'];

                        // if the random answer is not already in the question array, add it
                        if (!in_array($random_answer, $a)){
                            array_push($a, $random_answer);
                        } // end if
                        // continue the while loop until the $a array has 1 correnct and 4 random answers
                        // to be used for this specific queston
                    } // end while

                    // now shuffle the answers within the $a array so the correct answer is mixed among
                    // the incorrect answers when displayed 
                    shuffle($a); ?> <br>
                
                    <!-- generate the five radio dials of answer options for each question -->
                    <?php foreach ($a as $answer){ ?>
                        <!-- the name and value parameters are submitted in a key/value pair  -->
                        <input type="radio" name="<?php echo $i+1;?>" value="<?php echo $answer;?>"> <?php echo $answer;?> </input><br>
                    <?php } // end foreach loop ?> <br><br>
            <?php } // end for loop
                        
            ?>            
            <label>&nbsp;</label>
            <!-- brute force hack: capture the question asked and use name/value for key/value pair in POST -->
            <input type="hidden" name="q1" value="<?php echo $question[0]['question'];?>" >
            <input type="hidden" name="q2" value="<?php echo $question[1]['question'];?>" >
            <input type="hidden" name="q3" value="<?php echo $question[2]['question'];?>" >
            <input type="hidden" name="q4" value="<?php echo $question[3]['question'];?>" >
            <input type="hidden" name="q5" value="<?php echo $question[4]['question'];?>" >

            <!-- brute force hack: capture the correct answer asked and use name/value for key/value pair in POST -->
            <input type="hidden" name="a1" value="<?php echo $question[0]['answer'];?>" >
            <input type="hidden" name="a2" value="<?php echo $question[1]['answer'];?>" >
            <input type="hidden" name="a3" value="<?php echo $question[2]['answer'];?>" >
            <input type="hidden" name="a4" value="<?php echo $question[3]['answer'];?>" >
            <input type="hidden" name="a5" value="<?php echo $question[4]['answer'];?>" >

            <!-- Note, the user's selected answers are remitted via POST using the type submit button -->
            <!-- these answers are captured via the name & value parameters as a key / value pair -->
            <input class="btn btn-primary mt-3" type="submit" value="Submit Quiz">
        </form>
        </div>
    </body>
</html>