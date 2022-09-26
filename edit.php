<?php
require_once('./config/db_config.php');
$db = new operations();
$db->update();
$id = $_GET['U_ID'];
$result = $db->get_record($id);
$data = mysqli_fetch_assoc($result);
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
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h2 class="text-center">Update Employee</h2>
                </div>
                <?php $db->store_record(); ?>
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="id" placeholder="ID" class="form-control mb-2" value="<?php echo $data['id'] ?>">
                        <input type="text" name="first" placeholder="First Name" class="form-control mb-2" required value="<?php echo $data['firstName'] ?>">
                        <input type="text" name="last" placeholder="Last Name" class="form-control mb-2" required value="<?php echo $data['lastName'] ?>">
                        <input type="text" name="username" placeholder="User Name" class="form-control mb-2" required value="<?php echo $data['userName'] ?>">
                        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required value="<?php echo $data['email'] ?>">
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" name="btn-update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
