<?php   // use the questions model to pull the specific questions based on the user's inputs from the explore page
        // the question's model gives this page access to the $question array generated
        require '../model/add_question_model.php';

        // include the header
        include 'header_view.php';
?>

<div class="container pt-3 pb-3">
    <form action="../view/explore.php" method="post">
            <button class="btn btn-primary mt-3" type="submit" value="explore">Build Another Quiz</button>
    </form>
    <form action="../view/add_question_view.php" method="post">
            <button class="btn btn-primary mt-3" type="submit" value="explore">Add Another Question</button>
    </form>
</div>