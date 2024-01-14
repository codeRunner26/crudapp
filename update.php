<?php
        include ("connfile.php") ;
        // if ($_SERVER["REQUEST_METHOD"] == "POST"){  // && 
            if (isset($_POST['update'])) {
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
                $id = $_GET['id'];
            // SQL query

            $sql = "UPDATE `crudoperation` SET `fname` = '$fname', `lname` = '$lname', `password` = '$password', `conpassword` = '$conpassword', `gender` = '$gender', `email` = '$email', `phone` = '$phone', `address` = '$address' WHERE `sno` = $id";

            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Update!</strong> your data was updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                header("Location: formdata.php");
                exit();
            } else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong> ALERT !</strong> data not updated successfuly.
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
    <title>UPDATE DATA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- including CSS file -->
    <link rel="stylesheet" href="style.css">
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
            <h2 class="form_head">Update Data</h2>
            <form class="form_content" action="update.php?id=<?php echo $id;?>" method="POST">
                <div class="input_field">
                    <label for="name">First name</label>
                    <input type="text" name="fname" id="fname" placeholder="First Name"
                        value="<?php echo isset($row['fname']) ? $row['fname'] : ''; ?>" />
                </div>
                <div class="input_field">
                    <label for="name">Last name</label>
                    <input type="text" name="lname" id="lname" placeholder="Last Name"
                        value="<?php echo isset($row['lname']) ? $row['lname'] : ''; ?>" />
                </div>
                <div class="input_field">
                    <label for="name">password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        value="<?php echo isset($row['password']) ? $row['password'] : ''; ?>" />
                </div>
                <div class="input_field">
                    <label for="name">confirm password</label>
                    <input type="password" name="conpassword" id="conpassword" placeholder="Confirm Password"
                        value="<?php echo isset($row['conpassword']) ? $row['conpassword'] : ''; ?>" />
                </div>
                <div class="input_field">
                    <label for="name">Gender</label>
                    <select name="gender">
                        <option value="select"
                            <?php echo (isset($row['gender']) && $row['gender'] == 'select') ? 'selected' : ''; ?>>
                            Select</option>
                        <option value="male"
                            <?php echo (isset($row['gender']) && $row['gender'] == 'male') ? 'selected' : ''; ?>>Male
                        </option>
                        <option value="female"
                            <?php echo (isset($row['gender']) && $row['gender'] == 'female') ? 'selected' : ''; ?>>
                            Female</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="name">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email"
                        value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" />
                </div>
                <div class="input_field">
                    <label for="name">Ph-No</label>
                    <input type="tel" name="phone" id="phone" placeholder="Ph No"
                        value="<?php echo isset($row['phone']) ? $row['phone'] : ''; ?>" />
                </div>
                <div class="input_field">
                    <label for="name">Address</label>
                    <textarea name="address" id="" cols="30" rows="2"
                        placeholder="Address"><?php echo isset($row['address']) ? $row['address'] : '';?></textarea>
                </div>
                <div class="input_field">
                    <button type="submit" name="update">UPDATE</button>
                </div>
                <div class="input_field">
                    <a href="formdata.php" class="seedata">CANCEL </a>
                </div>
            </form>
        </div>
    </div>



    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, {
                utilsScript: "build/js/utils.js"
            });
            
            
        // Validate the phone number on form submission
        document.querySelector("form").addEventListener("submit", function(event) {
            // Check if the phone number is valid
            if (!iti.isValidNumber()) {
                // Prevent the form submission if the phone number is not valid
                event.preventDefault();
                alert("Please enter a valid phone number.");
            }
        });});</script> -->



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