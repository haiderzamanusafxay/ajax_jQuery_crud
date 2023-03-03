<?php
require_once('config.php');

$admno= $_GET['admno'];
$myQuery= "DELETE FROM studentsdata WHERE admission_no= '$admno' ";
$runQuery= mysqli_query($conn,$myQuery);
if($runQuery){
    echo "Successfully Deleted";
}
else{
    echo "The record can't be deleted there is some error";
}
?>