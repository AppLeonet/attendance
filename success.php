<?php 
    $title = 'Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $inputDate = $_POST['dob'];
        $formattedDate = date('Y/m/d', strtotime($inputDate));
        $dob = $formattedDate;
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];
        //call function to insert And track if success or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

        if($isSuccess){
            echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
        } else {
            echo '<h1 class="text-center text-danger">There was an error in processing!</h1>';
        }
    }
?>



<!-- This prints out values that were passed to the action page using method="get" -->
<!--div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php //echo $_GET['firstname'] . ' ' .$_GET['lastname'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['specialty'] ?></h6>
    <p class="card-text">Date of Birth: <?php //echo $_GET['dob'] ?></p>
    <p class="card-text">Email Address: <?php //echo $_GET['email'] ?></p>
    <p class="card-text">Contact Number: <?php //echo $_GET['phone'] ?></p>
  </div>
</div-->

<!-- This prints out values that were passed to the action page using method="post" -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' .$_POST['lastname'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty'] ?></h6>
    <p class="card-text">Date of Birth: <?php 
    $inputDate = $_POST['dob'];
    //echo $inputDate; 
    $formattedDate = date('Y/m/d', strtotime($inputDate));
    echo $formattedDate?></p>
    <p class="card-text">Email Address: <?php echo $_POST['email'] ?></p>
    <p class="card-text">Contact Number: <?php echo $_POST['phone'] ?></p>
  </div>
</div>

<!--?php 
    echo $_GET['firstname'];
    echo $_GET['lastname'];
    echo $_GET['dob'];
    echo $_GET['specialty'];
    echo $_GET['email'];
    echo $_GET['phone'];
?-->
<?php require_once 'includes/footer.php'; ?>