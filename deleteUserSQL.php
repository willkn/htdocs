<?php
include_once("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    deleteUser($db);
    header('Location: staffView.php');
}

function deleteUser($db)
{
    $id = $_GET['id'];
    $table = $_GET['table'];
    if ($_SESSION['connected']) {
        $sql = "DELETE FROM $table WHERE ID='$id'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $stmt->close();
    }
}