<?php
require_once('./config/db_config.php');
$db = new dbConfig();

class operations extends dbConfig
{
    // insert to db
    public function store_record()
    {
        global $db;
        if (isset($_POST["btn-create"])) {
            $firstName = $db->check($_POST['first']);
            $lastName = $db->check($_POST['last']);
            $userName = $db->check($_POST['username']);
            $email = $db->check($_POST['email']);

            if ($this->insert_record($firstName, $lastName, $userName, $email)) {
                echo '<div class="alert alert-success">Your record has been saved :)</div>';
            } else {
                echo '<div class="alert alert-danger">Your record has been failed :(</div>';
            }
        }
    }

    // insert to db using query
    public function insert_record($firstName, $lastName, $userName, $email)
    {
        global $db;
        $query = "INSERT INTO employees (firstName, lastName, userName, email) VALUES ('$firstName', '$lastName', '$userName', '$email')";
        $result = mysqli_query($db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // view db
    public function view_record()
    {
        global $db;
        $query = "SELECT * FROM employees";
        return mysqli_query($db->connection, $query);
    }

    // get particular data
    public function get_record($id)
    {
        global $db;
        $sql = "SELECT * FROM employees WHERE ID = $id";
        return mysqli_query($db->connection, $sql);
    }

    // update employee
    public function update()
    {
        global $db;
        if (isset($_POST["btn-update"])) {
            $id = $db->check($_POST['id']);
            $firstName = $db->check($_POST['first']);
            $lastName = $db->check($_POST['last']);
            $userName = $db->check($_POST['username']);
            $email = $db->check($_POST['email']);

            if ($this->update_record($id, $firstName, $lastName, $userName, $email)) {
                $this->set_message('<div class="alert alert-success">Your record has been updated :)</div>');
                header('LOCATION: view.php');
            } else {
                $this->set_message('<div class="alert alert-danger">Something went wrong :(</div>');
            }
        }
    }

    public function update_record($id, $firstName, $lastName, $userName, $email)
    {
        global $db;
        $sql = "UPDATE employees SET firstName = '$firstName', lastName = '$lastName', userName = '$userName', email = '$email' WHERE id = $id";
        $result = mysqli_query($db->connection, $sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // set session message
    public function set_message($msg)
    {
        if (!empty($msg)) {
            $_SESSION['Message'] = $msg;
        }
    }

    // display session message
    public function display_message()
    {
        if (isset($_SESSION['Message'])) {
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
        }
    }

    // delete employee
    public function delete_record($id)
    {
        global $db;
        $query = "DELETE FROM employees WHERE id = $id";
        $result = mysqli_query($db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
