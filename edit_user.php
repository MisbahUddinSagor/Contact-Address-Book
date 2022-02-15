<?php
include("connection.php");

$id = $_GET['id'];

$query = "SELECT * FROM contacts WHERE id='$id'";
$res = mysqli_query($connect, $query);

$row = mysqli_fetch_array($res);



if (isset($_POST['edit_user'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $id = $_GET['id'];

    $query = "UPDATE contacts SET firstname='$fname', lastname='$lname', company='$company', address='$address', email='$email', mobile='$mobile' WHERE id='$id'";

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
    <title>Edit Contact</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="add">
    <form class="my-form" method="post">
        <div class="addcontainer">
            <h1>Edit Contact</h1>
            <ul>
                <li>
                    <div class="grid grid-2">
                        <input type="text" name="fname" placeholder="First Name"  value="<?php echo $row['firstname']?>" required>
                        <input type="text" name="lname" placeholder="Last Name"  value="<?php echo $row['lastname']?>" required>
                    </div>
                </li>
                <li>
                    <div class="grid grid-2">
                        <input type="text" name="company" placeholder="Company Name" value="<?php echo $row['company']?>" required>
                        <input type="text" name="address" placeholder="Address" value="<?php echo $row['address']?>" >
                    </div>
                </li>
                <li>
                    <div class="grid grid-2">
                        <input type="email" name="email" placeholder="Email Address" value="<?php echo $row['email']?>" required>
                        <input type="text"name="mobile" placeholder="Mobile Number" value="<?php echo $row['mobile']?>" >
                    </div>
                </li>
                <li>
                    <div class="grid grid-3">
                        <div class="required-msg">REQUIRED FIELDS</div>
                        <button class="btn-grid btn-success" type="submit" name="edit_user">
                            <span class="front">Update Contact</span>
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