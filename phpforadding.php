<?php
require_once('pages/config.php');

$admno= $_POST['admno'];
$name= $_POST['name'];
$fname= $_POST['fname'];
$formb= $_POST['formb'];
$adress= $_POST['adress'];


$addingquery = "INSERT INTO `studentsdata`(`id`, `admission_no`, `s_name`, `f_name`, `form_b`, `address`) VALUES ('','$admno','$name','$fname','$formb','$adress')";

$runquery= mysqli_query($conn,$addingquery);
if ($runquery) {
    echo 'successfully added';
}else{
    echo 'there is some error';
}

?>