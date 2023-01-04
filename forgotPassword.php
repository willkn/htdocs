<?php
include_once("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('forgotPasswordSQL.php');
    checkCredentials($db);
}
?>

<head>
    <link rel="stylesheet" href="main.css?v=<?php echo time() ?>">
</head>

<!-- <div class="container bgColor">
    <main role="main" class="pb-3">
        <h1>Forgot password</h1>
        <div class="row">

            <div class="col-6">

                <form method="post">

                    <div class="form-group col-md-6">

                        <label class="control-label labelFont">Username</label>

                        <input class="form-control" type="text" name="username">

                        <span class="text-danger"></span>

                    </div>

                    <div class="form-group col-md-6">

                        <label class="control-label labelFont">Date Of Birth</label>

                        <input class="form-control" type="month" name="dob">

                        <span class="text-danger"></span>

                    </div>

                    <div class="form-group col-md-6">

                        <label class="control-label labelFont">Email Address</label>

                        <input class="form-control" type="text" name="email">

                        <span class="text-danger"></span>

                    </div>

                    <div class="form-group col-md-6">

                        <label class="control-label labelFont">Postcode</label>

                        <input class="form-control" type="text" name="postcode">

                        <span class="text-danger"></span>

                    </div>

                    <div class="form-group col-md-4">

                        <input class="btn btn-primary" type="submit" value="Reset password" name="submit">

                    </div>

            </div>

            </form>

        </div>

</div>

</main>

</div> -->

    <div class="form-body container">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Password Reset</h3>
                        <p>Fill in the form below to reset your password</p>
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="username" placeholder="Username" required>
                                <div class="valid-feedback">Username field is valid!</div>
                                <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="Email Address" required>
                                <div class="valid-feedback">Email field is valid!</div>
                                <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="DOB" placeholder="Date Of Birth MM/YY" required>
                            </div>


                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                                <div class="valid-feedback">Password field is valid!</div>
                                <div class="invalid-feedback">Password field cannot be blank!</div>
                            </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Reset password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include("footer.php") ?>