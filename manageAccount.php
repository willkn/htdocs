<?php
include_once("navbar.php");
include("viewUserData.php");

$userData = viewUserDataSQL($db, $_SESSION['role']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("editUserSQL.php");
    editMyself($db);
    // header('Location: manageAccount.php');
}

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css?v=<?php echo time() ?>">
</head>

<!-- <div class="row">

    <div class="col-5 form-body container">
        <div class="form-content">

            <div class="form-holder">

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
    </div>

</div> -->

<div class="form-body container">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Update Details</h3>
                    <p>Fill in the form to update your details</p>
                    <form class="requires-validation" novalidate>

                        <div class="col-md-12">
                        <label class="control-label labelFont">First name</label>
                            <input class="form-control" type="text" name="firstName" placeholder="First name"
                                value="<?php echo $userData[0] ?>" required>
                            <div class="valid-feedback">Username field is valid!</div>
                            <div class="invalid-feedback">Username field cannot be blank!</div>
                        </div>

                        <div class="col-md-12">
                        <label class="control-label labelFont">Last name</label>
                            <input class="form-control" type="text" name="lastName" placeholder="Last name"
                                value="<?php echo $userData[1] ?>" required>
                            <div class="valid-feedback">Email field is valid!</div>
                            <div class="invalid-feedback">Email field cannot be blank!</div>
                        </div>

                        <div class="col-md-12">
                        <label class="control-label labelFont">Email</label>
                            <input class="form-control" type="text" name="email" placeholder="Email"
                                value="<?php echo $userData[2] ?>" required>
                            <div class="valid-feedback">Password field is valid!</div>
                            <div class="invalid-feedback">Password field cannot be blank!</div>
                        </div>

                        <div class="col-md-12">
                        <label class="control-label labelFont">Date Of Birth</label>
                            <input class="form-control" type="text" name="dob" placeholder="Date Of Birth MM/YY"
                                value="<?php echo $userData[3] ?>" required>
                        </div>

                        <div class="col-md-12">
                        <label class="control-label labelFont">Postcode</label>
                            <input class="form-control" type="text" name="postcode" placeholder="Postcode"
                                value="<?php echo $userData[4] ?>" required>
                            <div class="valid-feedback">Password field is valid!</div>
                            <div class="invalid-feedback">Password field cannot be blank!</div>
                        </div>


                        <div class="col-md-12">
                        <label class="control-label labelFont">Membership</label>
                            <select name="membership">
                                <option value="none" selected hidden>
                                    <?php echo $userData[5] ?>
                                </option>
                                <option value="none">None</option>
                                <option value="day">£5.50 Day pass</option>
                                <option value="monthly">£13.50 Monthly pass</option>
                            </select>
                            <div class="valid-feedback">Password field is valid!</div>
                            <div class="invalid-feedback">Password field cannot be blank!</div>
                        </div>

                        <div class="col-md-12">
                        <label class="control-label labelFont">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password"
                                value="<?php echo $userData[6] ?>" required>
                            <div class="valid-feedback">Password field is valid!</div>
                            <div class="invalid-feedback">Password field cannot be blank!</div>
                        </div>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary">Update details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php") ?>