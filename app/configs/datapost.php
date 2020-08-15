<?php 
include("dbconnection.php");

if (isset($_POST['btnSubmit'])) {
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $contact = $_POST['txtPhone'];
    $message = $_POST['txtMsg'];

    $mysqli->query =("INSERT INTO contact_us (name, email, contact, message) VALUES ('$name', '$email', '$contact', '$message')") or die($connection->error); 
    // $result = mysqli_connect($connection,$query);
    // if ($result) {
    //   echo "Save";
    // }else{
    //     echo "Not Save";
    // }
    // mysqli_free_result($result);
    // mysqli_close($connection);
}
// if (isset($_GET['delete'])) {
//    $id = $_GET['delete'];
//    $connection-
// }

?>