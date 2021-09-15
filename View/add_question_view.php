<?php   
        // include header
        include 'header_view.php';
        // use each of the models to pull the data needed for the drop down lists
        require '../model/school.php';
        require '../model/subject.php';
        require '../model/course.php';        
        require '../model/topic.php';
?>
    <!-- put form into a container with padding and added classes to select tags to format them - rs -->
    <div class="container mt-3 mb-3">
        <form action="question_added.php" method="post">
        <!-- the form's action parameter is the path to where it will send the user upon submit -->
        <h1>Schools</h1>
                <select class="form-select" name="schoolID">
                    <?php foreach($school as $row) { ?>
                    <!-- data is coming from the school.php model -->
                    <!-- the model opens the connection to the database, sends the SQL querry string -->
                    <!-- the model returns the $school array that you need to loop through to get the contents by field name -->
                    <!-- present each option within a drop down list -->
                        <option value="<?php echo $row["schoolID"]; ?>"> <?php echo $row["school_name"]; ?> </option>
                    <?php } ?>
                </select>

            <h1 class="pt-3">Subjects</h1>
                <select class="form-select" name="subjectID">
                    <?php foreach($subject as $row) { ?>
                    <!-- data is coming from the subject.php model -->
                    <!-- the model opens the connection to the database, sends the SQL querry string -->
                    <!-- the model returns the $subject array that you need to loop through to get the contents by field name -->
                    <!-- present each option within a drop down list -->
                        <option value="<?php echo $row["subjectID"]; ?>"> <?php echo $row["subject_name"]; ?> </option>
                    <?php } ?>
            </select>

            <h1 class="pt-3">Courses</h1>
                <select class="form-select" name="courseID">
                    <?php foreach($course as $row) { ?>
                    <!-- data is coming from the course.php model -->
                    <!-- the model opens the connection to the database, sends the SQL querry string -->
                    <!-- the model returns the $course array that you need to loop through to get the contents by field name -->
                    <!-- present each option within a drop down list -->
                        <option value="<?php echo $row["courseID"]; ?>"> <?php echo $row["course_number"]; ?> </option>
                    <?php } ?>
            </select>

            <h1 class="pt-3">Topics</h1>
                <select class="form-select" name="topicID">
                    <?php foreach($topic as $row) { ?>
                    <!-- data is coming from the topic.php model -->
                    <!-- the model opens the connection to the database, sends the SQL querry string -->
                    <!-- the model returns the $topic array that you need to loop through to get the contents by field name -->
                    <!-- present each option within a drop down list -->
                        <option value="<?php echo $row["topicID"]; ?>"> <?php echo $row["topic_name"]; ?> </option>
                    <?php } ?>
                </select>
                
                <label for="q"><h1 class="form-label pt-3">Question:</h1></label><br>
                <textarea class="form-control" id="q" name="question" rows="2" cols="160"></textarea>
                <br>
                <label for="a"><h1 class="form-label">Answer:</h1></label><br>
                <textarea class="form-control" id="a" name="answer" rows="2" cols="160"></textarea>
                <br>

            <label>&nbsp;</label>
            <!-- the type "submit" parameter will send each 'name' and 'value' parameter as a key/value pair -->
            <!-- the value parameter is the text for the submit button -->
            <input class="btn btn-primary mt-3" type="submit" value="Add Question"><br><br>
        </form>





<?php   include 'footer.php'; ?>