<?php
$id = $_GET['id'];

include("connection.php");

$query = "DELETE FROM contacts WHERE id='$id'";

$res = mysqli_query($connect, $query);

if ($res){
    echo "<script>alert('You have succesfully deleted')</script>";
    echo '<script>alert("Deleted")</script>';
    header("Location:index.php");
}
else{
    echo "<script>alert('Failed')</script>";
}
?>
