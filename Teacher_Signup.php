<?php
require_once ('Connect.php');
include "header.php";

$ssn = $_POST['ssn'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname= $_POST['lname'];
$bdate = $_POST['bdate'];
$city = $_POST['city'];
$street = $_POST['street'];
$block = $_POST['block'];
$zipcode = $_POST['zipcode'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$school = $_POST['school'];


$s_validate = mysqli_query($conn,"Select * from Schools where name = '{$school}'");

if($s_validate->num_rows) {
    $apply = $conn->prepare("call SignUpTeacher(?,?,?,?,?,?,?,?,?,?,?,?)");
    $apply->bind_param('ssssssssssss',$ssn,$fname,$mname,$lname,$bdate,$city,$street,$block,$zipcode,$email,$gender,$school);
    $apply->execute();
    if (!$apply) {
        echo $conn->errno . " " . $conn->error;
    } else {
        header("location: Success.php");
        die();
    }
}else
{
    echo "School does not exist. " . $conn->errno . " " . $conn->error;
}

?>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
