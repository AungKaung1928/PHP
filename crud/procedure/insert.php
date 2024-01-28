

<?php
include ('db.php');

//write query, and run it
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Use prepared statement to prevent SQL injection
    // memorize the query, INSERT INTO Table name () VALUES ();
    $sql = "INSERT INTO user (name, email, created_date, modified_date) VALUES ('$name','$email', now(), now())";

    //running the query
    mysqli_query($conn, $sql);

    //redirecting using header function
    header("location:index.php");

}


?>
