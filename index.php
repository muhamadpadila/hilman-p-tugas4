<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define variables to store form data
$namaLengkap = $comment = $email = $gender = $website = "";
$hobi = [];

// Define variables to store error messages
$namaLengkapErr = $commentErr = $emailErr = $genderErr = $websiteErr = "";

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Nama Lengkap
    if (empty($_POST["namaLengkap"])) {
        $namaLengkapErr = "Nama Lengkap is required";
    } else {
        $namaLengkap = sanitize_input($_POST["namaLengkap"]);
    }

    // Validate Comment
    if (empty($_POST["comment"])) {
        $commentErr = "Comment is required";
    } else {
        $comment = sanitize_input($_POST["comment"]);
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = sanitize_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = sanitize_input($_POST["gender"]);
    }

    // Validate Website
    if (!empty($_POST["website"])) {
        $website = sanitize_input($_POST["website"]);
        // Check if the website address is well-formed
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid website format";
        }
    }

    // Collect selected Hobi
    if (isset($_POST["hobi"])) {
        $hobi = $_POST["hobi"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .error { color: #ff0000; }
    </style>
    <title>Registration Form</title>
</head>
<body>
    <div class="container">
        <form class="form-horizontal mx-auto" method="POST" action="result.php">
            <fieldset>
                <h1 class="text-center">Registration Form</h1>

                <!-- Nama Lengkap -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="namaLengkap">Nama Lengkap</label>  
                    <div class="col-md-4">
                        <input id="namaLengkap" name="namaLengkap" type="text" placeholder="" class="form-control input-md" required>
                        <span class="error"><?php echo $namaLengkapErr; ?></span>
                    </div>
                </div>

               

                <!-- Email -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Email</label>  
                    <div class="col-md-4">
                        <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required>
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
                </div>

                <!-- Website -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="website">Website</label>  
                    <div class="col-md-4">
                        <input id="website" name="website" type="text" placeholder="http://example.com" class="form-control input-md">
                        <span class="error"><?php echo $websiteErr; ?></span>
                    </div>
                </div>

                <!-- Textarea -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="comment">Comment</label>
                    <div class="col-md-4">                     
                        <textarea class="form-control" id="comment" name="comment">default text</textarea>
                    </div>
                    </div>


                <!-- Gender -->
                <div class="form-group">
                    <label class="col-md-4 control-label">Gender</label>  
                    <div class="col-md-4">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="male" required> Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="female" required> Female
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="other" required> Other
                        </label>
                        <span class="error"><?php echo $genderErr; ?></span>
                    </div>
                </div>

                <!-- Rest of your form -->

                <div class="form-group">
                    <label class="col-md-4 control-label" for="button"></label>
                    <div class="col-md-4">
                        <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
