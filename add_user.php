<?php
include("connection.php");

if (isset($_POST['add_user'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $query = "INSERT INTO contacts(firstname,lastname,company,address,email,mobile) VALUES('$fname','$lname','$company','$address','$email','$mobile')";

    $res = mysqli_query($connect, $query);

    if ($res){
        echo "<script>alert('You have succesfully added new contact.')</script>";
        header("Location:index.php");
    }
    else{
        echo "<script>alert('Failed')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Contact</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="add">
    <form class="my-form" method="post">
        <div class="addcontainer">
            <h1>Add New Contact</h1>
            <ul>
                <li>
                    <div class="grid grid-2">
                        <input type="text" name="fname" placeholder="First Name"  required>
                        <input type="text" name="lname" placeholder="Last Name"  required>
                    </div>
                </li>
                <li>
                    <div class="grid grid-2">
                        <input type="text" name="company" placeholder="Company Name" required>
                        <input type="text" name="address" placeholder="Address">
                    </div>
                </li>
                <li>
                    <div class="grid grid-2">
                        <input type="email" name="email" placeholder="Email Address"required>
                        <input type="text"name="mobile" placeholder="Mobile Number">
                    </div>
                </li>
                <li>
                    <div class="grid grid-3">
                        <div class="required-msg">REQUIRED FIELDS</div>
                        <button class="btn-grid btn-success" type="submit" name="add_user">
                            <span class="front">Add Contact</span>
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </form>
    <footer>

    </footer>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</body>

</html>