<?php

function loginSQL($db, $table = "Customer")
{
    $_SESSION['loggedIn'] = false;
    $password = md5($_POST['password']);

    if ($_SESSION['connected']) {
        $sql = "SELECT Username, Password, ID, Role FROM $table WHERE Username=? AND Password=?";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $_POST['username']);
        $stmt->bindParam(2, $password);

        $result = $stmt->execute();
        $result = ($result->fetchArray());

        if ($result and getStatus($db, $result[3]) != "Disabled") {
            if ($result[3] == 'Staff') {
                $_SESSION['role'] = 'Staff';

            } else {
                $_SESSION['role'] = 'Customer';
            }

            if ($result[3] == 'Manager') {
                $_SESSION['role'] = 'Manager';
            }

            $_SESSION['ID'] = $result[2];
            $_SESSION['loggedIn'] = true;
        } else {
            $_SESSION['loggedIn'] = false;
        }

        $stmt->close();

        return $_SESSION['loggedIn'];
    }
}

function daysToRenewal($db, $table)
{
    if ($table == "Manager") {
        $table = "Staff";
    }

    $sql = "SELECT JoinDate FROM $table WHERE ID=?";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $_SESSION['ID']);

    $result = $stmt->execute();
    $result = ($result->fetchArray());

    if (isset($result) and $result[0] < 100) {
        $timeToRenewal = (time() + 2678400) - strtotime($result[0]);
        $timeToRenewal /= 86400;
        $timeToRenewal = floor($timeToRenewal) + 1;
        return $timeToRenewal;
    }
}

function getStatus($db, $id)
{
    $sql = "SELECT Status FROM Staff WHERE ID=?";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(1, $id);
    $result = $stmt->execute()->fetchArray();

    return $result[0];
}