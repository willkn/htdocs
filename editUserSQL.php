<?php

function editUserSQL($db)
{
    require("insertUser.php");
    $username = generateUsername();
    $date = date('d-m-Y');
    $password = md5($_POST['password']);
    $status = "PENDING";
    $table = $_POST['role'];

    if ($table == 'Manager') {
        $table == 'Staff';
    }


    if ($_SESSION['connected']) {

        $sql = "UPDATE Customer SET Username=?, FirstName=?, LastName=?, Postcode=?, Email=?, DOB=?, Password=?, Membership=?, Payment=? WHERE ID=?;";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $_POST['firstName']);
        $stmt->bindParam(3, $_POST['lastName']);
        $stmt->bindParam(4, $_POST['postcode']);
        $stmt->bindParam(5, $_POST['email']);
        $stmt->bindParam(6, $_POST['dob']);
        $stmt->bindParam(7, $password);
        $stmt->bindParam(8, $_POST['membership']);
        $stmt->bindParam(9, $_POST['payment']);
        $stmt->bindParam(10, $_POST['id']);

        if (isset($_POST['membership'])) {
            if ($_POST['membership'] != "none") {
                updateJoinDate($db, 'Customer');
            }
        } else {
        }


        $result = $stmt->execute();

        $stmt->close();
    }
}

function editStaff($db)
{
    require("insertUser.php");
    $username = generateUsername();
    $date = date('d-m-Y');
    $password = md5($_POST['password']);

    if ($_SESSION['connected']) {

        $sql = "UPDATE Staff SET Username=?, FirstName=?, LastName=?, Postcode=?, Email=?, DOB=?, Password=?, Membership=?, Status=? WHERE ID=?";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $_POST['firstName']);
        $stmt->bindParam(3, $_POST['lastName']);
        $stmt->bindParam(4, $_POST['postcode']);
        $stmt->bindParam(5, $_POST['email']);
        $stmt->bindParam(6, $_POST['dob']);
        $stmt->bindParam(7, $password);
        $stmt->bindParam(8, $_POST['membership']);
        $stmt->bindParam(9, $_POST['status']);
        $stmt->bindParam(10, $_POST['id']);

        $result = $stmt->execute();

        $stmt->close();
    }
}

function editMyself($db)
{
    require("insertUser.php");
    $username = generateUsername();
    $date = date('d-m-Y');
    $password = md5($_POST['password']);
    $status = "PENDING";
    $table = $_SESSION['role'];

    if ($table == 'Manager') {
        $table == 'Staff';
    }


    if ($_SESSION['connected']) {

        $sql = "UPDATE Customer SET Username=?, FirstName=?, LastName=?, Postcode=?, Email=?, DOB=?, Password=?, Membership=? WHERE ID=?;";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $_POST['firstName']);
        $stmt->bindParam(3, $_POST['lastName']);
        $stmt->bindParam(4, $_POST['postcode']);
        $stmt->bindParam(5, $_POST['email']);
        $stmt->bindParam(6, $_POST['dob']);
        $stmt->bindParam(7, $password);
        $stmt->bindParam(8, $_POST['membership']);
        $stmt->bindParam(9, $_SESSION['ID']);

        if (isset($_POST['membership'])) {
            if ($_POST['membership'] != "none") {
                updateJoinDate($db, $table);
            }
        } else {
        }


        $result = $stmt->execute();

        $stmt->close();
    }
}

function updateJoinDate($db, $table)
{
    $today = date("d-m-Y");
    $id = $_POST['id'] ?? $_SESSION['ID'];

    $sql = "UPDATE $table SET JoinDate=? WHERE ID=?";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(1, $today);
    $stmt->bindParam(2, $id);

    $stmt->execute();

    $stmt->close();
}