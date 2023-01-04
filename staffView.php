<?php
include_once("navbar.php");
include("viewUserData.php");

$customerData = viewAllCustomerDataSQL($db, $_SESSION['role']);
$staffData = viewAllStaffDataSQL($db, $_SESSION['role']);
$allData = ($_SESSION['role'] == 'Manager') ? array_merge($customerData, $staffData) : $customerData;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['action'] == 'create') {
        require("insertUser.php");
        createUserSQL($db, $_POST['role']);
    } else if ($_POST['role'] == "Staff") {
        require("editUserSQL.php");
        editStaff($db);
    } else {
        require("editUserSQL.php");
        editUserSQL($db);
    }
    header('Location: staffView.php');
}
?>

<div class="row container-fluid">

    <div class="col-5">

        <table class="table">

            <thead class="table">

                <td>User ID</td>

                <td>First Name</td>

                <td>Last Name</td>

                <td>Username</td>

                <td>Password</td>

                <td>Postcode</td>

                <td>DOB</td>

                <td>Email</td>

                <td>Membership</td>

                <td>Payment</td>

                <td>Role</td>

                <td>Status</td>

            </thead>

            <?php
            for ($i = 0; $i < count($allData); $i++):
                ?>

                <tr>
                    <form action="staffView.php" method="POST">

                        <td><input name="id" readonly="readonly" value="<?php echo $allData[$i]['ID'] ?>"></td>
                        <td><input name="firstName" value="<?php echo $allData[$i]['FirstName'] ?>"></input></td>
                        <td><input name="lastName" value="<?php echo $allData[$i]['LastName'] ?>"></input></td>
                        <td><input name="username" readonly="readonly"
                                value="<?php echo $allData[$i]['Username'] ?>"></input>
                        </td>
                        <td><input name="password" value="<?php echo $allData[$i]['Password'] ?>"></input></td>
                        <td><input name="postcode" value="<?php echo $allData[$i]['Postcode'] ?>"></input></td>
                        <td><input name="dob" value="<?php echo $allData[$i]['DOB'] ?>"></input></td>
                        <td><input name="email" value="<?php echo $allData[$i]['Email'] ?>"></input>
                        <td><select name="membership">
                                <option value="none" selected hidden>
                                    <?php echo $allData[$i]['Membership'] ?? "none" ?>
                                </option>
                                <option value="none">None</option>
                                <option value="day">£5.50 Day pass</option>
                                <option value="monthly">£13.50 Monthly pass</option>
                            </select>
                        </td>
                        <td>
                            <select name="payment">
                                <option hidden value="<?php echo $allData[$i]['Payment'] ?>">
                                    <?php echo $allData[$i]['Payment'] ?>
                                </option>
                                <option value="PENDING">PENDING</option>
                                <option value="PAID">PAID</option>
                            </select>
                        </td>
                        <?php if (isset($allData[$i]['Role'])): ?>
                            <td>
                                <select name="role">
                                    <option selected hidden value="<?php echo $allData[$i]['Role'] ?>">
                                        <?php echo $allData[$i]['Role'] ?>
                                    </option>
                                    <option disabled value="Staff">Staff</option>
                                    <option disabled value="Customer">Customer</option>
                                </select>
                            </td>
                            <?php endif; ?>
                        <td>
                            <select name="status">
                                <option selected disabled hidden>
                                    <?php echo $allData[$i]['Status'] ?? "None" ?>
                                </option>
                                <option value="Active">ACTIVE</option>
                                <option value="Disabled">DISABLED</option>
                            </select>
                        </td>
                        </td>
                        <td><input type="hidden" name="action" value="update"></td>


                        <td><a class="btn btn-primary"
                                href="deleteUserSQL.php?id=<?php echo $allData[$i]['ID'] ?>&table=<?php echo $allData[$i]['Role'] ?>"
                                role="button">Delete</a></td>

                        <td><button class="btn btn-primary" type="submit">Update</button></td>
                    </form>
                </tr>
                <?php endfor; ?>

            <tr>
                <form action="staffView.php" method="POST">
                    <td><input type="text" readonly="readonly">read only</td>
                    <td><input type="text" name="firstName"></td>
                    <td><input type="text" name="lastName"></td>
                    <td><input type="text" readonly="readonly">read only</td>
                    <td><input type="text" name="password"></td>
                    <td><input type="text" name="postcode"></td>
                    <td><input type="text" name="dob"></td>
                    <td><input type="text" name="email"></td>
                    <td>
                        <select name="membership">
                            <option value="none">none</option>
                            <option value="day">£5.50 Day pass</option>
                            <option value="monthly">£13.50 Monthly pass</option>
                        </select>
                    </td>
                    <td>
                        <select name="payment">
                            <option value="PENDING">PENDING</option>
                            <option value="PAID">PAID</option>
                        </select>
                    </td>
                    <td>
                        <select name="role">
                            <option value="Staff">Staff</option>
                            <option value="Customer">Customer</option>
                        </select>
                    </td>
                    <td>
                        <select name="status">
                            <option value="ACTIVE">Active</option>
                            <option value="DISABLED">Disabled</option>
                        </select>
                    </td>
                    <td><input type="hidden" name="action" value="create"></td>
                    <td><button class="btn btn-primary" type="submit">Create</button></td>
                </form>
            </tr>

        </table>

    </div>

    <?php include("footer.php") ?>