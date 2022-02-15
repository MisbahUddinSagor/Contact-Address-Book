<?php
include("connection.php");

 $sql = "SELECT * FROM contacts ";

 if (isset($_POST['search'])) {

     $search_term = mysqli_real_escape_string($connect, $_POST['search_box']);

     $sql .= "WHERE address = '{$search_term}' ";
 }

 $query = mysqli_query($connect, $query) or die(mysqli_error($connect));
 ?>
