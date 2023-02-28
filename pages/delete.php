<?php
require_once('config.php');
$admno= $_POST['tobedeleted'];
$myQuery= "DELETE FROM studentsdata WHERE admission_no= '$admno' ";
$runQuery= mysqli_query($conn,$myQuery);
if($runQuery){
    echo "<div class='alert alert-success' role='alert'>Successfully Deleted </div>";
}
else{
    echo "<div class='alert alert-danger role='alert'>
    The record can't be deleted there is some error
  </div>";
}
?>