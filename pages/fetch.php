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
    <button class="badge bg-danger" value="<?php echo $row['admission_no']; ?>" id="delete">Delete<i class="fa fa-trash" aria-hidden="true"></i>
</button>
    <span class="badge bg-warning text-dark">Update</span>
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