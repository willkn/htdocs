<?php
include_once("navbar.php");
include("viewUserData.php");

$userData = viewUserDataSQL($db, $_SESSION['role']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("editUserSQL.php");
    editMyself($db);
    header('Location: manageAccount.php');
}

?>

<h1>Manage account</h1>

<div class="row">

    <div class="col-5">

        <form method="post">

            <div class="form-group col-md-6">

                <label class="control-label labelFont">First name</label>

                <input class="form-control" type="text" name="firstName" value=<?php echo $userData[0] ?>>

                <span class="text-danger"></span>

            </div>

            <div class="form-group col-md-6">

                <label class="control-label labelFont">Last name</label>

                <input class="form-control" type="text" name="lastName" value=<?php echo $userData[1] ?>>

                <span class="text-danger"></span>

            </div>

            <div class="form-group col-md-6">

                <label class="control-label labelFont">Email</label>

                <input class="form-control" type="text" name="email" value=<?php echo $userData[2] ?>>

                <span class="text-danger"></span>

            </div>

            <div class="form-group col-md-6">

                <label class="control-label labelFont">Date of birth</label>

                <input class="form-control" type="text" name="dob" value=<?php echo $userData[3] ?>>

                <span class="text-danger"></span>

            </div>

            <div class="form-group col-md-6">

                <label class="control-label labelFont">Postcode</label>

                <input class="form-control" type="text" name="postcode" value=<?php echo $userData[4] ?>>

                <span class="text-danger"></span>

            </div>

            <label class="control-label labelFont">Membership</label>

            <select name="membership">
                <option value="<?php echo $allData[$i]['Membership'] ?>" selected disabled hidden>
                    <?php echo $userData[5] ?>
                </option>
                <option value="none">Don't change membership plan</option>
                <option value="day">Buy new £5.50 Day pass</option>
                <option value="monthly">Buy new £13.50 Monthly pass</option>
            </select>

            <p>Payment: <?php echo $userData[6] ?></p>

            <div class="form-group col-md-6">

                <label class="control-label labelFont">Enter new password</label>

                <input class="form-control" type="password" name="password">

                <span class="text-danger"></span>

            </div>

            <div class="form-group col-md-4">

                <input class="btn btn-primary" type="submit" value="Update details" name="submit">

            </div>
        </form>
    </div>

</div>

<?php include("footer.php") ?>