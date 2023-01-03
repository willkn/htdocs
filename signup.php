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

        return $fieldErrors;
    }

    function createUser($db) {
        require("insertUser.php");
        $_SESSION['username'] = createUserSQL($db, 'Customer');
    }
}

// returns a boolean that indicates whether the form is complete
function checkIfFormComplete($fieldErrors) {

    foreach(array_values($fieldErrors) as $value) {
        if($value != "") {
            return false;
        }
    }

    return true;
}

// post redirect get pattern used to avoid form resubmission on refresh.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();

    // sets user values and checks for any illegal user input.
    $fieldErrors = $user->setUserValues($fieldErrors);

    // checks if the form is complete, if it is then it redirects and if it isn't it destroys the object.
    if(!checkIfFormComplete($fieldErrors)) {
        unset($user);
    } else {
        // check sql statement executes successfully before redirecting.
        $user->createUser($db);
        include("loginSQL.php");
        header("Location: accountCreationSuccessful.php");
    }
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h1>Sign up</h1>
        <div class="row">
            <div class="col-6">

                <form method="post">

                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">First Name</label>

                        <span class="text-danger"><?php echo $fieldErrors['firstName']; ?></span>

                        <input class="form-control" type="text" name="firstName">

                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Last Name</label>

                        <span class="text-danger"><?php echo $fieldErrors['lastName'] ?></span>

                        <input class="form-control" type="text" name="lastName">


                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Date Of Birth</label>

                        <span class="text-danger"><?php echo $fieldErrors['dob'] ?></span>

                        <input class="form-control" type="month" name="dob">

                    </div>

                    <div class="form-group col-md-6">

                        <label class="control-label labelFont">Email Address</label>

                        <span class="text-danger"><?php echo $fieldErrors['email'] ?></span>

                        <input class="form-control" type="text" name="email">

                    </div>

                    <div class="form-group col-md-6">

                        <label class="control-label labelFont">Postcode</label>

                        <span class="text-danger"><?php echo $fieldErrors['postcode'] ?></span>

                        <input class="form-control" type="text" name="postcode">

                    </div>

                    <div class="form-group col-md-6">

                        <label class="control-label labelFont">Password</label>

                        <span class="text-danger"><?php echo $fieldErrors['password']; ?></span>

                        <input class="form-control" type="password" name="password">

                    </div>

                    <div class="form-group col-md-4">

                        <input class="btn btn-primary" type="submit" value="Create User" name="submit">

                    </div>

                </form>

            </div>

        </div>

    </main>

</div>

<?php include("footer.php") ?>