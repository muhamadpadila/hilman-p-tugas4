<?php
// Retrieve form data
$namaLengkap = isset($_POST["namaLengkap"]) ? $_POST["namaLengkap"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$website = isset($_POST["website"]) ? $_POST["website"] : "";
$comment = isset($_POST["comment"]) ? $_POST["comment"] : "";
$gender = isset($_POST["gender"]) ? $_POST["gender"] : "";

// Display results in a table
echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
    <title>Registration Form Result</title>
</head>
<body>
    <div class=\"container\">
        <h2>Form Data:</h2>
        <table class=\"table table-bordered\">
            <tr>
                <th>Nama Lengkap</th>
                <td>$namaLengkap</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>$email</td>
            </tr>
            <tr>
                <th>Website</th>
                <td>$website</td>
            </tr>
            <tr>
                <th>Comment</th>
                <td>$comment</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>$gender</td>
            </tr>
        </table>
        <a href=\"index.php\" class=\"btn btn-primary\"> Utama</a>
    </div>

    <script src=\"https://code.jquery.com/jquery-3.6.4.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
</body>
</html>";
?>
