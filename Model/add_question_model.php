<?php   require 'database.php'; 

        if (!$conn){
                echo "Add Question Model Connection Failure (per model/add_question_model.php)"."<br>";
        }


// capture user selections from drop down lists
$schoolID = $_POST['schoolID'];
$subjectID = $_POST['subjectID'];
$courseID = $_POST['courseID'];
$topicID = $_POST['topicID'];
$question = $_POST['question'];
$answer = $_POST['answer'];

// Attempt insert query execution
$sql = "INSERT INTO question (userID, schoolID, subjectID, courseID, topicID, question, answer) 
        VALUES (0,'".$schoolID."','".$subjectID."','".$courseID."','".$topicID."','".$question."','".$answer."')";

?>
<h1>
<?php if (!mysqli_query($conn, $sql)) {
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
?>
</h1> 
<?php
// Close connection
mysqli_close($conn);

?>

