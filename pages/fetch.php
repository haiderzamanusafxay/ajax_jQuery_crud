<?php
require_once('config.php');
$query= "SELECT * FROM studentsdata";
$runquery= mysqli_query($conn,$query);

// check if there are no records in the DB 
if($runquery->num_rows!= 0){
while($row= mysqli_fetch_assoc($runquery)){
?>
<tr>
<td><?php echo $row['admission_no'] ?></td>
<td><?php echo $row['s_name'] ?></td>
<td><?php echo $row['f_name'] ?></td>
<td><?php echo $row['form_b'] ?></td>
<td><?php echo $row['address']; ?></td>
<td>
    <span class="badge badge-danger" value="<?php echo $row['admission_no']; ?>" id="delete"></>Delete</span>
    <span class="badge badge-success" value="<?php echo $row['admission_no']; ?>" id="update">Update</span>
    <!-- uncomment for icons  -->
    <i class="bi bi-trash icon-red" value="<?php echo $row['admission_no']; ?>" id="delete"></i>
    <i class="bi bi-pencil-square icon-green" value="<?php echo $row['admission_no']; ?>" id="update"></i>
</td>
</tr>
<?php
}
}else{
    echo "<tr>
       <td colspan='6' id='noresult' >NO RECORD FOUND ADD SOME RECORD</td>
       </tr>";
}
?>