<?php 
    // include header
    include 'header_view.php';


    $question1 = $_POST['q1'];
    $question2 = $_POST['q2'];
    $question3 = $_POST['q3'];            
    $question4 = $_POST['q4'];
    $question5 = $_POST['q5'];

    $response1 = $_POST['1'];
    $response2 = $_POST['2'];
    $response3 = $_POST['3'];
    $response4 = $_POST['4'];
    $response5 = $_POST['5'];

    $answer1 = $_POST['a1'];
    $answer2 = $_POST['a2'];
    $answer3 = $_POST['a3'];
    $answer4 = $_POST['a4'];
    $answer5 = $_POST['a5'];

    $schoolID = $_GET['schoolID'];
    $subjectID = $_GET['subjectID'];
    $courseID = $_GET['courseID'];
    $topicID = $_GET['topicID'];
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
<div class="container mt-3 mb-3">
<?php
    $correct = 0;
        echo "1) ".$question1."<br>";
        if ($response1 == $answer1){
            echo "Your answer is correct: ".$answer1."<br><br>"; 
            $correct++;} 
        else {
            echo "Your answer ".$response1." is incorrect<br>";
            echo "The correct answer is: ".$answer1."<br><br>";}

        echo "2) ".$question2."<br>";
        if ($response2 == $answer2){
            echo "Your answer is correct: ".$answer2."<br><br>"; 
            $correct++;} 
        else {
            echo "Your answer ".$response2." is incorrect<br>";
            echo "The correct answer is: ".$answer2."<br><br>";}

        echo "3) ".$question3."<br>";
        if ($response3 == $answer3){
            echo "Your answer is correct: ".$answer3."<br><br>"; 
            $correct++;} 
        else {
            echo "Your answer ".$response3." is incorrect<br>";
            echo "The correct answer is: ".$answer3."<br><br>";}

        echo "4) ".$question4."<br>";
        if ($response4 == $answer4){
            echo "Your answer is correct: ".$answer4."<br><br>"; 
            $correct++;} 
        else {
            echo "Your answer ".$response4." is incorrect<br>";
            echo "The correct answer is: ".$answer4."<br><br>";}
        
        echo "5) ".$question5."<br>";
        if ($response5 == $answer5){
            echo "Your answer is correct: ".$answer5."<br><br>"; 
            $correct++;} 
        else {
            echo "Your answer ".$response5." is incorrect<br>";
            echo "The correct answer is: ".$answer5."<br><br>";}      
    
        $score = ($correct/5)*100;     
        echo "You scored: ".$score."%";
    ?>

        <form action="../view/explore.php" method="post">
            <button class="btn btn-primary mt-3" type="submit" value="explore">Build Another Quiz</button>
        </form>
    </div>
    </body>
</html>