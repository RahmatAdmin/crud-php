<?php
include '../config/config.php';

if(isset($_POST["id"])) {
    $id = $_POST["id"];

    $QUERY = "DELETE FROM data WHERE id = ?";
    $action = $connection->prepare($QUERY);
    $action->bind_param("i", $id);

    if($action->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        die("gagal" . $action->error);
    } 
}
?>