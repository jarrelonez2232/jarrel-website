<?php include 'crud.php'; 
echo "Please Edit here:";
echo "ID Number:";
echo $id=$_GET['id'];
$select= "SELECT * FROM name WHERE id='$id'";
$data=mysqli_query($con,$select);
$row=mysqli_fetch_array($data);
?> <br><br>
<div>
    <form action="" method="POST">
        <input value="<?php echo $row ['fullname']?>"type="text" name="fullname"
        placeholder="fullname"> <br><br>
        <input value="<?php echo $row ['email']?>"type="email" name="email"
        placeholder="email"> <br><br>
        <input value="<?php echo $row ['age']?>"type="number" name="age"
        placeholder="age"> <br><br>
        <input type="submit" name="update_btn"
        value="Update">

    </form>
</div>
<?php 
if (isset($_POST['update_btn']))
{
    $fname=$_POST['fullname'];
    $email=$_POST['email'];
    $age=$_POST['age'];
$update="UPDATE name SET fullname='$fname',email='$email',
age='$age' WHERE id='$id'";
$data=mysqli_query($con,$update);
if($data) {
    ?>
    <script type="text/javascript">
        alert("Data Updated Successfully");
        window.open("http://localhost/todo-application/crud.php","_self");
    </script>
    <?php

}
else {
    ?>
    <script type="text/javascript">
        alert("Please try again");
    </script>
    <?php
}
}?>
