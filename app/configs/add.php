<?php 
include('app/configs/dataposts.php');
 
if(isset($_POST['add'])) {    
    $firstname = $datapost->escape_string($_POST['firstname']);
    $lastname = $datapost->escape_string($_POST['lastname']);
    $address = $datapost->escape_string($_POST['address']);
        
    //insert data to database
    $sql = "INSERT INTO data_post (name, contact, email, ) VALUES ('$firstname','$lastname','$address')";

    if($datapost->execute($sql)){
        $_SESSION['message'] = 'Member added successfully';
    }
    else{
        $_SESSION['message'] = 'Cannot add member';
    }
        
    header('location: index.php');
}
else{
    $_SESSION['message'] = 'Fill up add form first';
    header('location: index.php');
}
?>