<?php
require_once('config.php');
$recieced_search= $_GET['searched'];  
// $recieced_search= 'h'; 

// if($recieced_search!=""){ 
 
    $myQuery= "SELECT * FROM studentsdata where admission_no like '%$recieced_search%' OR s_name LIKE '%$recieced_search%' OR  f_name like '%$recieced_search%'or form_b LIKE '%$recieced_search%' OR address LIKE '%$recieced_search%'";

    $RUN= mysqli_query($conn,$myQuery);
    // echo '<pre>';
    // print_r($RUN);
    // echo '</pre>';
    // exit();
    if($RUN->num_rows!= 0){
    while($row= mysqli_fetch_assoc($RUN)){
?>
<tr>
<td><?php echo $row['admission_no'] ?></td>
<td><?php echo $row['s_name'] ?></td>
<td><?php echo $row['f_name'] ?></td>
<td><?php echo $row['form_b'] ?></td>
<td><?php echo $row['address']; ?></td>
<td>
    <span class="badge bg-danger">Delete</span>
    <span class="badge bg-warning text-dark">Update</span>
</td>
</tr>

<?php
    
}
}
else{

       echo "<tr>
       <td colspan='6' id='noresult' >NO RECORD FOUND</td>
       </tr>";
    }
// } 
?>
