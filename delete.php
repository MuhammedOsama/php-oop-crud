<?php
require_once('./config/db_config.php');
$db = new operations();

if (isset($_GET['D_ID'])) {
    global $db;
    $id = $_GET['D_ID'];

    if ($db->delete_record($id)) {
        $db->set_message('<div class="alert alert-danger">Your Record Has Been deleted :)</div>');
        header('LOCATION: view.php');
    } else {
        $db->set_message('<div class="alert alert-danger"> Something Wrong :(</div>');
    }
}
