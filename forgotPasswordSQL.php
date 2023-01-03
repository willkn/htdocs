<?php
function checkCredentials($db)
{

    if ($_SESSION['connected']) {
        $sql = "SELECT ID FROM Customer WHERE Username=? AND DOB=? AND Email=? AND Postcode=? ";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $_POST['username']);
        $stmt->bindParam(2, $_POST['dob']);
        $stmt->bindParam(3, $_POST['email']);
        $stmt->bindParam(4, $_POST['postcode']);

        $result = $stmt->execute();
        $result = ($result->fetchArray());
        $_SESSION['ID'] = $result[0];

        try {
            if ($result) {
                header('Location: setNewPassword.php');
            }
        } catch (Exception $e) {
            echo "unable to reset.";
        }

        $stmt->close();
    }
}

function setNewPassword($db)
{
    if ($_SESSION['connected']) {
        $id = $_SESSION['ID'];
        $password = md5($_POST['password']);

        $sql = "UPDATE Customer SET Password=? WHERE ID=?";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $password);
        $stmt->bindParam(2, $id);

        $stmt->execute();

        header('Location: index.php');

        $stmt->close();
    }
}