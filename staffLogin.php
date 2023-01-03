<?php
include_once("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("loginSQL.php");
    if (loginSQL($db, "Staff")) {
        header("Location: staffView.php");
    }
}

?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <h1>Staff sign in</h1>
        <div class="row">

            <div class="col-6">

                <form method="post">

                    <div class="form-group col-md-6">

                        <label class="control-label labelFont">Username</label>

                        <input class="form-control" type="text" name="username">

                        <span class="text-danger"></span>

                    </div>

                    <div class="form-group col-md-6">

                        <label class="control-label labelFont">Password</label>

                        <input class="form-control" type="password" name="password">

                        <span class="text-danger"></span>

                    </div>

                    <div class="form-group col-md-4">

                        <input class="btn btn-primary" type="submit" value="Login" name="submit">

                    </div>

                </form>

            </div>

        </div>

    </main>

</div>

<?php include("footer.php") ?>