<?php
include_once("navbar.php");
include_once("dbConnect.php");

// add real time validation with javascript
// add min length for password etc
// add second password field to confirm they are identical.
$user = "";
$fieldErrors = [
    "firstName" => "",
    "lastName" => "",
    "dob" => "",
    "email" => "",
    "postcode" => "",
    "password" => "",
];

class User
{
    // write some protection where necessary in these setters.
    protected $firstName = "";

    function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this->firstName;
    }

    function getFirstName()
    {
        return $this->firstName;
    }

    protected $lastName = "";

    function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    protected $dob = "";

    function setDOB($dob)
    {
        $this->dob = $dob;
    }

    protected $email = "";

    function setEmail($email)
    {
        $this->email = $email;
    }

    protected $postcode = "";

    function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    protected $password = "";

    function setPassword($password)
    {
        $this->password = $password;
    }

    protected $username = "";

    function setUsername()
    {
        // need to protect for short names.

        $this->username = substr($this->firstName, 0, 3) . substr($this->lastName, -2) . rand(1, 10) . rand(1, 10);
        echo "$this->username";
    }

    function getUsername()
    {
        return $this->username;
    }


    function setUserValues($fieldErrors)
    {
        // use booleans with that show a specific error message if the field is empty.
        foreach (array_keys($fieldErrors) as $key) {
            if (($_POST[$key]) != "") {
                $this->$key = $_POST[$key];
            } else {
                $fieldErrors[$key] = "$key is required";
            }
        }

        // return $fieldErrors;
    }

    function createUser($db)
    {
        require("insertUser.php");
        $_SESSION['username'] = createUserSQL($db, 'Customer');
    }
}

// returns a boolean that indicates whether the form is complete
function checkIfFormComplete($fieldErrors)
{

    foreach (array_values($fieldErrors) as $value) {
        if ($value != "") {
            return false;
        }
    }

    return true;
}

// post redirect get pattern used to avoid form resubmission on refresh.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();

    // sets user values and checks for any illegal user input.
    // $fieldErrors = $user->setUserValues($fieldErrors);

    // checks if the form is complete, if it is then it redirects and if it isn't it destroys the object.
    // if (!checkIfFormComplete($fieldErrors)) {
    //     unset($user);
    // } else {
    // check sql statement executes successfully before redirecting.
    $user->createUser($db);
    header("Location: accountCreationSuccessful.php");
    // }
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css?v=<?php echo time() ?>">
</head>

<div class="form-body container">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Sign up</h3>
                    <p>Fill in the form below to create an account</p>
                    <form class="requires-validation" method="POST" novalidate>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="firstName" placeholder="First name" required>
                            <div class="valid-feedback">Username field is valid!</div>
                            <div class="invalid-feedback">Username field cannot be blank!</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="lastName" placeholder="Last name" required>
                            <div class="valid-feedback">Email field is valid!</div>
                            <div class="invalid-feedback">Email field cannot be blank!</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="dob" placeholder="Date Of Birth MM/YY"
                                required>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="email" placeholder="Email" required>
                            <div class="valid-feedback">Password field is valid!</div>
                            <div class="invalid-feedback">Password field cannot be blank!</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="postcode" placeholder="Postcode" required>
                            <div class="valid-feedback">Password field is valid!</div>
                            <div class="invalid-feedback">Password field cannot be blank!</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="valid-feedback">Password field is valid!</div>
                            <div class="invalid-feedback">Password field cannot be blank!</div>
                        </div>

                        <div class="col-md-12">
                            <select name="membership">
                                <option value="Membership" hidden selcted>Membership</option>
                                <option value="none">None</option>
                                <option value="day">£5.50 Day pass</option>
                                <option value="monthly">£13.50 Monthly pass</option>
                            </select>
                        </div>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary">Create account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php") ?>