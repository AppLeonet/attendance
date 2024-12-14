<?php 
    //$title = 'Success';
    //require_once 'includes/header.php'; 
    require_once 'db/conn.php';


//get values from post operation
if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $inputDate = $_POST['dob'];
        $formattedDate = date('Y/m/d', strtotime($inputDate));
        $dob = $formattedDate;
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];


//call crud function
    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);
//redirect to index.php
    if($result) {
        header("Location: viewrecords.php");
    } else {
        //echo 'error';
        include 'includes/errormessage.php';
    }
} else {
    //echo 'error';
    include 'includes/errormessage.php';
}
?>
<?php require_once 'includes/footer.php'; ?>