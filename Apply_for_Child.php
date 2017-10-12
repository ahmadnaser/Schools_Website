<?php
require_once ('Connect.php');
include "header.php";

$ssn = $_POST['ssn'];
$name = $_POST['fname'];
$gender = $_POST['gender'];
$bdate = date('m/d/Y',strtotime($_POST['bdate']));
$school = $_POST['school'];
$grade = $_POST['grade'];
echo $grade;
$parent_username = $_SESSION['username'];
//!$conn->query("call Apply_Child_for_School($grade ,$parent_username ,$ssn ,$name ,$bdate , $gender , $school )")

$apply = $conn->prepare("call Apply_Child_for_School(?,?,?,?,?,?,?)");
$apply->bind_param('issssss', $grade, $parent_username, $ssn, $name, $bdate, $gender, $school);
$apply->execute();
if (!$apply) {
    echo "Error " . $conn->errno . " " . $conn->error;
} else {
    header("location: View_Schools_Accepted_My_Children.php");
    die();
}



?>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
