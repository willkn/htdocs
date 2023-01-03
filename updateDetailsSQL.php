<?php 

function updateDetails($db)
{
    if ($_SESSION['connected']) {
        $sql = "UPDATE Customer SET FirstName=?, LastName=?, Email=?, DOB=?, Postcode=?, Membership=? WHERE ID=?";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $_POST['firstName']);
        $stmt->bindParam(2, $_POST['lastName']);
        $stmt->bindParam(3, $_POST['email']);
        $stmt->bindParam(4, $_POST['dob']);
        $stmt->bindParam(5, $_POST['postcode']);
        $stmt->bindParam(6, $_POST['membership']);
        $stmt->bindParam(7, $_SESSION['ID']);

        $stmt->execute();
        $stmt->close();
    }
}