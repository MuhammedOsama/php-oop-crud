<?php
require_once('./config/db_config.php');
$db = new operations();
$result = $db->view_record();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>CRUD - OOP</title>
</head>
<body class="bg-dark">
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header">
                    <h2 class="text-center text-dark">Employees List</h2>
                </div>
                <?php
                $db->display_message();
                $db->display_message();
                ?>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 10%">ID</td>
                            <td style="width: 20%">First Name</td>
                            <td style="width: 20%">Last Name</td>
                            <td style="width: 20%">User Name</td>
                            <td style="width: 20%">Email</td>
                            <td style="width: 10%" colspan="2">Operations</td>
                        </tr>
                        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['firstName'] ?></td>
                                <td><?php echo $data['lastName'] ?></td>
                                <td><?php echo $data['userName'] ?></td>
                                <td><?php echo $data['email'] ?></td>
                                <td><a href="edit.php?U_ID=<?php echo $data['id'] ?>" class="btn btn-success">Edit</a></td>
                                <td><a href="delete.php?D_ID=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
