<?php
echo '<span style="font-size: 30px; font-weight: bold;">SIMPLE CRUD PHP </span>';
?>
<br><br>

<?php
$host="localhost";
$user="root";
$pass="";
$db="jarreldata";

$con=mysqli_connect($host,$user,$pass,$db);

if ($con) {
    echo "";
}
else {
    echo "DB Not Connected";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div>
    <form action="" method="POST">
        <input type="text" name="fullname"
        placeholder="fullname"> <br><br>
        <input type="email" name="email"
        placeholder="email"> <br><br>
        <input type="number" name="age"
        placeholder="age"> <br><br>
        <input type="submit" name="save_btn"
        value="Save"> <br><br>

    </form>
</div>
<?php 
if (isset($_POST['save_btn']))
{
    $fname=$_POST['fullname'];
    $email=$_POST['email'];
    $age=$_POST['age'];
$query="INSERT INTO name (fullname,email,age) VALUES('$fname',
'$email','$age')";
$data=mysqli_query($con,$query);
if($data) {
    ?>
    <script type="text/javascript">
        alert("Data Saved Successfully");
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
</body>
</html>
<table border="1px" cellpadding="10px" cellspacing="0px">
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Age</th>
        <th colspan="2">Actions</th>
</tr>
<?php
$query="SELECT * FROM name";
$data=mysqli_query($con,$query);
$result=mysqli_num_rows($data);
if ($result){
    while ($row=mysqli_fetch_array($data)){
        ?> 
        <tr>
            <td><?php echo $row ['fullname'];
            ?></td>
             <td><?php echo $row ['email'];
            ?></td>
             <td><?php echo $row ['age'];
            ?></td>
            
            <td><a href="edit.php?id=<?php echo $row ['id'];
            ?>">Edit</a></td>

            <td><a onclick="return confirm('Do you want to delete?')" href="delete.php?id=<?php echo $row ['id']?>">Delete</a></td>

            </tr>
            <?php
    }
}
else {
    ?>
    <tr>
        <td>No Record Found</td>
</tr> 
<?php
}

