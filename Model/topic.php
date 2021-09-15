<?php require 'database.php';

    if (!$conn){
        echo "Topic Table Connection Failure"."<br>";
    }	
    
// Get all users via SELECT * from the users table
$strSQL = "SELECT topicID, topic_name FROM topic";

// Step 1 - GET RESULTS: 
// the mysqli_query() function takes two required arguments, the information needed to connect to the database ($connect) and the query string you want to execute ($strSQL)
// the first argument is $connect that is coming from your config.php file that includes the 'local host address', 'you usesrname', 'you password', 'the database you want to access'
// the second argument is the query you want to execute and that comes from the $strSQL variable you declared on line # above, but you could enter that entire string in place of the variable
// the function returns a mysqli_result object that you'll then need to process via mysqli_fetch_all()
$result = mysqli_query($conn, $strSQL); // this should be the same for all queries based on the strSQL that you send it

// Step 2 - FETCH DATA: 
// the myslqi_fetch_all() function fetches all records (rows) per your query and returns the results as an associative array, a numeric array, or both
// the function take two arguments, the $results (required) received from Step 1 - GET RESULTS and the format for how you want those results (optional), .e.g. mysqli_fetch_all(result, resultType)
// the result type can be associative (MYSQLI_ASSOC), numeric (MYSQLI_NUM) or both (MYSLQI_BOTH)
// you store the return value in a new variable that you can name whatever is descriptive for your use case
// IMPORTANT NOTE --> this variable, $topic, is what holds all the data returned and what you'll use to access specific record fields in your display via php echo statments in movie.php line #
$topic = mysqli_fetch_all($result, MYSQLI_ASSOC); // you will rename your variable for each specific query

// Step 3 - FREE RESULT: 
// the mysqli_free_result() function fetches rows from a result-set, then frees the memory associated with the result
// the one required argument to pass is the $result obtained via Step 1 - GET RESULTS using mysqli_query()
// this function has no return value so you don't assign it to a variable
mysqli_free_result($result);

// Step 4 - CLOSE CONNECTION: 
// myslqi_close() will close a previously opended database connection.
// the function takes one argument and that is the same $connection data path you sent to it via myqsli_query() in step 1 - GET RESULTS
// the function will return TRUE on success and FALSE on failure
mysqli_close($conn);
?>