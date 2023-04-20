<?php 
include 'crud.php'; 

$id = $_GET['id'];
$query = "DELETE FROM name WHERE id = '$id'";
$result = mysqli_query($con, $query);

if ($result) {
?>
    <script type="text/javascript">
        alert("Deleted Successfully");
        window.open("http://localhost/todo-application/crud.php","_self");
    </script>
<?php 
} else {
?>
    <script type="text/javascript">
        alert("Please try again");
    </script>
<?php
}
?>