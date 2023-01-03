<?php
include_once("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('forgotPasswordSQL.php');
    checkCredentials($db);
}
?>

<div class="container bgColor">
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

</div>

<?php include("footer.php") ?>