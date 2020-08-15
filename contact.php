<?php
  $databaseHost = 'localhost';
  $databaseName = 'tourpackage';
  $databaseUsername = 'root';
  $databasePassword = '';
  
  $name ="";
  $email = "";
  $contact = "";
  $message = "";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
//Add----------//
if(isset($_POST['btnSubmit'])){
      if ($_POST['btnSubmit'] == "Send Message") {    
        $name = $_POST['txtName'];
        $email = $_POST['txtEmail'];
        $contact = $_POST['txtPhone'];
        $message = $_POST['txtMsg'];
              
            //insert data to database
            $_SESSION['msg'] = "Record has been saved.";
            $_SESSION['msg_type'] = "success";
            $result = mysqli_query($mysqli, "INSERT INTO contact_us(name,email,contact,message) VALUES('$name','$email','$contact','$message')");
            $name = "";
            $email = "";
            $contact = "";
            $message = "";
        //     //display success message
        //     echo "<font color='green'>Data added successfully.";
        //     echo "<br/><a href='index.php'>View Result</a>";
        // }
      }elseif($_POST['btnSubmit'] == "Update") {    
        $id = $_GET['edit'];
        $name = $_POST['txtName'];
        $email = $_POST['txtEmail'];
        $contact = $_POST['txtPhone'];
        $message = $_POST['txtMsg'];
              
            //insert data to database
            $_SESSION['msg'] = "Record has been saved.";
            $_SESSION['msg_type'] = "success";
            $result = mysqli_query($mysqli, "UPDATE contact_us SET name='$name',email='$email',contact='$contact',message='$message' WHERE id=$id");
          

        //     //display success message
        //     echo "<font color='green'>Data added successfully.";
        //     echo "<br/><a href='index.php'>View Result</a>";
        // }
        }
        $name = "";
        $email = "";
        $contact = "";
        $message = "";
        $btnSubmit = "Send Message";
}
//Edit------------///
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    
  //selecting data associated with this particular id
  $result = mysqli_query($mysqli, "SELECT * FROM contact_us WHERE id=$id");
      while($res = mysqli_fetch_array($result)){
      $name = $res['name'];
      $email = $res['email'];
      $contact = $res['contact'];
      $message = $res['message'];
      $btnSubmit = "Update";
      
      
  }
}
//Delete----------//
if(isset($_GET['delete'])){    
  $id = $_GET['delete'];
  $result = mysqli_query($mysqli, "DELETE FROM contact_us WHERE id='$id'");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"/>
    <link href="css/landing-page.css" rel="stylesheet" />
  </head>
  <title>Contact</title>
  <body style="background: -webkit-linear-gradient(left, #0072ff, #00c6ff);">
 <!--------------------------->
    <div class="container contact-form">
      <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
      </div>
      <form method="POST">
        <h3>Drop Us a Message</h3>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="<?php echo $name ?>"/>
            </div>
            <div class="form-group">
              <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="<?php echo $email ?>"/>
            </div>
            <div class="form-group">
              <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="<?php echo $contact ?>"/>
            </div>
            <div class="form-group">
              <input type="submit" name="btnSubmit" class="btnContact" placeholder="" value="<?php echo $btnSubmit ?>"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"><?php echo $message ?></textarea>
            </div>
          </div>
        </div>
      </form>
      <?php 
           $mysqli = new mysqli('localhost','root','','tourpackage') or die(mysqli_error($mysqli));
          $result = $mysqli->query("SELECT * FROM contact_us") or die($mysqli->error);
          // pre_r($result);
          // pre_r($result->fetch_assoc());
           ?>
     <div class="row">
     <div class="col-md-12">
     <div class="container">
        <table class="table table-hover">
          <thead class="thead-dark">
             <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Message</th>
                <th colspan="2">Action</th>
             </tr>
          </thead>
          <?php 
            while ($row = $result->fetch_assoc()):?>
            <tr>
               <td><?php echo $row['id'];?></td>
               <td><?php echo $row['name'];?></td>
               <td><?php echo $row['email'];?></td>
               <td><?php echo $row['contact'];?></td>
               <td><?php echo $row['message'];?></td>
               <td>
                 <a href="contact.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                  <a href="contact.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
               </td>
            </tr>  
            <?php endwhile; ?>      
        </table>
        </div>
        </div>
      </div>
          <?php
          function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
          }
      ?>
     </div>
  </body>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>
