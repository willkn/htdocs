<?php
include_once("navbar.php");
include_once("dbConnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST['username'] . " " . $_POST['password'];
    require("loginSQL.php");
    if (loginSQL($db)) {
        header("Location: index.php");
    }
}
?>

<head>
    <link rel="stylesheet" href="main.css?v=<?php echo time() ?>">
</head>

<div class="container bgColor">
    <!-- <main role="main" class="pb-3">
        <h1>Sign in</h1>
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

                        <input class="btn btn-primary" type="submit" value="Sign in" name="submit">

                    </div>

                </form>

            </div>

        </div>

    </main> -->

    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Fitness Palace</h3>
                        <p>Customer Login</p>
                        <form class="requires-validation" method="POST" novalidate>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="username" placeholder="Username" required>
                                <div class="valid-feedback">Username field is valid!</div>
                                <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" placeholder="Password"
                                    required>
                                <div class="valid-feedback">Password field is valid!</div>
                                <div class="invalid-feedback">Password field cannot be blank!</div>
                            </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" value="Login" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include("footer.php") ?>