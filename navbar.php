<?php
include("dbConnect.php");

function checkIfUser($sessionVar)
{
    try {
        $sessionVarBool = $_SESSION['role'] == $sessionVar;
    } catch (Exception $e) {
        $sessionVarBool = false;
    }

    return $sessionVarBool;
}

function checkIfLoggedIn()
{
    try {
        return $_SESSION['loggedIn'];
    } catch (Exception $e) {
        return false;
    }
}
?>

<head>
    <meta http-equiv="cache-control" content="no-cache">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Fitness Palace</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/index.php">Home</a>
            </li>


            <?php if (!@checkIfLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login.php">Login</a>
                </li>
                <?php endif; ?>

            <?php if (!@checkIfLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/stafflogin.php">Staff Login</a>
                </li>
                <?php endif; ?>

            <?php if (!@checkIfLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/signup.php">Sign up</a>
                </li>
                <?php endif; ?>

            <?php if (!@checkIfLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/forgotPassword.php">Forgot password</a>
                </li>
                <?php endif; ?>

            <?php if (@checkIfLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/manageAccount.php?id=<?php echo $_SESSION['ID'] ?? "" ?>">Manage Account</a>
                </li>
                <?php endif; ?>

            <?php if (@checkIfLoggedIn() and (checkIfUser('Staff') or checkIfUser('Manager'))): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/staffView.php">Edit Userbase</a>
                </li>
                <?php endif; ?>

            <?php if (@checkIfLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/logout.php">Log out</a>
                </li>
                <?php endif; ?>
            <?php if (@checkIfLoggedIn()): ?>
                <li class='nav-link'>
                    <strong>
                        <?php
                        require("loginSQL.php");
                        $daysToRenewal = daysToRenewal($db, $_SESSION['role']);
                        echo "Time to renewal: " . daysToRenewal($db, $_SESSION['role']) + 1 . " days";

                        ?>
                    </strong>
                </li>
                <?php endif; ?>
        </ul>
    </div>
</nav>