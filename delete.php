<?php
require_once('connection.php');

$id = $_GET['id'];

if (isset($_GET['id'])) {

    $sql = "DELETE FROM admission_crud WHERE id = $id ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: user.php');
    } else {
        echo "Unable to delete user";
    }
}
