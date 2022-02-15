<?php
require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Address Book</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <h4 class="head" style="text-align:center">Contact Address Book</h4>
            <div class="result">

            </div>
        </div>
    </div>



    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            load_data();

            function load_data() {

                $.ajax({
                    url: "load_data.php",
                    method: "POST",
                    success: function(data) {
                        $(".result").html(data);
                    }
                })
            }

            // $(document).on('click','.delete', function() {
            //     var id = $(this).attr("id");

            //     $.ajax({
            //         url:"delete_user.php",
            //         method:"POST",
            //         data:{id:id},
            //         success:function (data) {
            //             load_data();
            //         }
            //     });
            // });

            $(".delete").click(function() {
                var id = $(this).parents("tr").attr("id");
                if (confirm('Are you sure to delete this record ?')) {
                    $.ajax({
                        url: 'delete_user.php',
                        type: 'GET',
                        data: {
                            id: id
                        },
                        error: function() {
                            alert('Something is wrong, couldn\'t delete record');
                        },
                        success: function(data) {
                            $("#" + id).remove();
                            alert("Record delete successfully.");
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>