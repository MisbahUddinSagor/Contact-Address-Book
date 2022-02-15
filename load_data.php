<?php

include("connection.php");

$query = "SELECT * FROM contacts ORDER BY id ASC";
$res = mysqli_query($connect, $query);

$output = "";


$output .= "
            <table class='table table-bordered'>
            <tr>
                <th style=text-align:cente width='20%'>FirstName</th>
                <th style=text-align:cente width='10%'>LastName</th>
                <th style=text-align:cente width='15%'>Company Name</th>
                <th style=text-align:cente width='10%'>Address</th>
                <th style=text-align:cente width='10%'>Email Address</th>
                <th style=text-align:cente width='12%'>Mobile Number</th>
                <th style=text-align:cente width='20%'>Action</th>
            </tr>
";

echo "<a href='add_user.php'><button type='button' class='btn btn-success my-3'>Add New Contact</button></a>";

if (mysqli_num_rows($res) < 1) {
    $output .= "
        <tr>
            <td colspan='7' align='center'>NO DATA</td>
        </tr>
    ";
}

while ($row = mysqli_fetch_array($res)) {
    $output .= "
        <tr>
        <td>" . $row['firstname'] . "</td>
        <td>" . $row['lastname'] . "</td>
        <td>" . $row['company'] . "</td>
        <td>" . $row['address'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['mobile'] . "</td>
        <td>
            <div class='col-md-12'>
                <div class='row'>
                    <div class='col-md-6'>
                        <a href='edit_user.php?id=" . $row['id'] . "'> <button id='" . $row['id'] . "' class='btn btn-success'>Edit</button></a>
                    </div>
                    <div class='col-md-6'>
                        <a href='delete_user.php?id=" . $row['id'] . "'> <button id='" . $row['id'] . "' class='delete btn btn-danger'>Delete</button></a>
                    </div>
                </div>
            </div>
        </td>
        </tr>
        ";
}


echo $output;
?>