<?php
        //  for  reloading  on data submit 
        session_start();
        include ("connfile.php") ;

        // if ($_SERVER["REQUEST_METHOD"] == "POST"){  // && 
            if (isset($_POST['submit'])) {
                // var_dump($_POST);
            $fname       = $_POST['fname'];
            $lname       = $_POST['lname'];
            $password    = $_POST['password'];
            $conpassword = $_POST['conpassword'];
            $gender      = $_POST['gender'];
            $email       = $_POST['email'];
            $phone       = $_POST['phone'];
            $address     = $_POST['address'];
                
            if($fname !="" && $lname !="" && $password !="" && $conpassword !="" && $gender !="" && $email !="" && $phone !="" && $address !="") {

                
            // SQL query
            $sql = "INSERT INTO `crudoperation` (`fname`, `lname`, `password`, `conpassword`, `gender`, `email`, `phone`, `address`) VALUES ('$fname', '$lname', '$password', '$conpassword', '$gender', '$email', '$phone', '$address')";
        
            $result = mysqli_query($conn, $sql);
            if($result){
                $_SESSION['success_message'] = 'Your data was successfully submitted.';
                
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            } else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> ALERT !</strong> data insertion failed.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> CHECK IT !</strong> please fill  the form  fields below first.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Success!</strong> ' . $_SESSION['success_message'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        // Clear the success message to prevent repeated display
        unset($_SESSION['success_message']);
    }
?>

<?php
include("connfile.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `crudoperation` WHERE sno = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Fetched data can be used to pre-fill the form fields
    } else {
        // Handle case where no data is found for the given ID
        echo "No data found for ID: $id";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD APP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- including CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- include   flag or css  for country code  -->
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    <style>
    .error {
        color: red;
    }

    .input_error {
        border: 1px solid red !important;
    }
    </style>

</head>

<body>
    <div class="container">
        <div class="form" style="width: 700px !important;">
            <h2 class="form_head">Registration Form</h2>
            <form class="form_content" action="index.php" method="POST">
                <!-- First Name -->
                <div class="input_field">
                    <label for="fname">First name</label>
                    <input type="text" name="fname" id="fname" placeholder="First Name" />
                    <span id="fname_error" class="error"></span>
                </div>
                <!-- Last Name -->
                <div class="input_field">
                    <label for="lname">Last name</label>
                    <input type="text" name="lname" id="lname" placeholder="Last Name" />
                    <span id="lname_error" class="error"></span>
                </div>
                <!-- Password -->
                <div class="input_field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" />
                    <span id="password_error" class="error"></span>
                </div>
                <!-- Confirm Password -->
                <div class="input_field">
                    <label for="conpassword">Confirm password</label>
                    <input type="password" name="conpassword" id="conpassword" placeholder="Confirm Password" />
                    <span id="conpassword_error" class="error"></span>
                </div>
                <!-- Gender -->
                <div class="input_field">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="select">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <span id="gender_error" class="error"></span>
                </div>
                <!-- Email -->
                <div class="input_field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" />
                    <span id="email_error" class="error"></span>
                </div>
                <!-- Phone -->
                <div class="input_field">
                    <label for="phone">Ph-No</label>
                    <input type="tel" name="phone" id="phone" placeholder="Ph No" />
                    <span id="phone_error" class="error"></span>
                </div>
                <!-- Address -->
                <div class="input_field">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="30" rows="2" placeholder="Address"></textarea>
                    <span id="address_error" class="error"></span>
                </div>
                <!-- Submit Button -->
                <div class="input_field">
                    <button type="submit" name="submit">SUBMIT</button>
                </div>
                <!-- See Data Link -->
                <div class="input_field">
                    <a href="formdata.php" target="_blank" class="seedata"> SEE DATA </a>
                </div>
            </form>
        </div>
    </div>

    <!-- js file  link  -->
    <script src="script.js"></script>
    <!-- library path for  phone number country code or flag -->
    <script src="build/js/utils.js"></script>
    <script src="build/js/intlTelInput.js"></script>
    <!-- bootstrap  link  for form  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>