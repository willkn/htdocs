<?php
function viewUserDataSQL($db, $table = "Customer")
{   
    if($table == "Manager")
    {
        $table = "Staff";
    }
    
    if ($_SESSION['connected']) {
        $sql = "SELECT FirstName, LastName, Email, DOB, Postcode, Membership, Payment, Password FROM $table WHERE ID=?";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $_SESSION['ID']);
        $result = $stmt->execute();
        $result = ($result->fetchArray());
        $stmt->close();

        return $result;
    }
}

function viewAllStaffDataSQL($db, $table)
{
    if ($table = "Manager") {
        $table = "Staff";
    }
    $result = [];
    if ($_SESSION['connected']) {
        $sql = "SELECT * FROM Staff";

        $stmt = $db->prepare($sql);
        $stmtReturn = $stmt->execute();

        while ($row = $stmtReturn->fetchArray()) {
            array_push($result, $row);
        }

        $stmt->close();

        return $result;
    }
}

function viewAllCustomerDataSQL($db, $table)
{
    $result = [];
    if ($_SESSION['connected']) {
        $sql = "SELECT * FROM Customer";

        $stmt = $db->prepare($sql);
        $stmtReturn = $stmt->execute();

        while ($row = $stmtReturn->fetchArray()) {
            array_push($result, $row);
        }

        $stmt->close();

        return $result;
    }
}