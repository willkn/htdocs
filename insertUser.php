<?php

function generateUsername()
{
    $username = "";
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    ensureValidString($firstName, 3);
    ensureValidString($lastName, 2);

    $username .= substr($firstName, 0, 3) . substr($lastName, -2) . rand(0, 9) . rand(0, 9);

    return $username;
}

function ensureValidString($string, $length)
{
    if (strlen($string < $length)) {
        $string = padString($string, $length);
    }
}

function padString($string, $finalLength)
{
    while (strlen($string) < $finalLength) {
        $string .= rand(0, 9);
    }

    return $string;
}

function createUserSQL($db, $table)
{
    $username = generateUsername();
    $date = date('d-m-Y');
    $status = "PENDING";
    $password = md5($_POST['password']);
    $firstName = ucfirst($_POST['firstName']);
    $lastName = ucfirst($_POST['lastName']);
    $postcode = trim(strtoupper($_POST['postcode']));


    if ($_SESSION['connected']) {
        $sql = "INSERT INTO $table(Username, FirstName, LastName, JoinDate, Postcode, Email, Password, DOB, Role, Membership) VALUES (:username, :firstName, :lastName, :joinDate, :postcode, :email, :password, :dob, :role, :membership)";
        
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':username', $username, SQLITE3_TEXT);
        $stmt->bindParam(':firstName', $firstName, SQLITE3_TEXT);
        $stmt->bindParam(':lastName', $lastName, SQLITE3_TEXT);
        $stmt->bindParam(':joinDate', $date, SQLITE3_TEXT);
        $stmt->bindParam(':postcode', $postcode, SQLITE3_TEXT);
        $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
        $stmt->bindParam(':password', $password, SQLITE3_TEXT);
        $stmt->bindParam(':dob', $_POST['dob'], SQLITE3_TEXT);
        $stmt->bindParam(':status', $status, SQLITE3_TEXT);
        $stmt->bindParam(':role', $_POST['role'], SQLITE3_TEXT);
        $stmt->bindParam(':membership', $_POST['membership'], SQLITE3_TEXT);


        $stmt->execute();

        $stmt->close();

        return $username;
    }
}
