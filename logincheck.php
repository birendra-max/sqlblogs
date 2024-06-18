<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sql Technical Solutions">
    <?php
    require("DbConnection.php");
    $query = "select problem from blogs;";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        while ($da = mysqli_fetch_assoc($res)) {
    ?>
            <meta name="keywords" content="<?php echo $da['problem'] ?>">
    <?php
        }
    }
    ?>
    <meta name="author" content="Mr.Naren Dahiya">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/blog.png" type="image/x-icon">
    <title>Welcome ! SqlTechError Login Page</title>
</head>

<body>
    <?php
    function check($email, $encryptionPassword)
    {
        include "DbConnection.php";
        $query = "select email,password from admin where email='$email' or password='$encryptionPassword';";
        $res = mysqli_query($conn, $query);
        $r = mysqli_fetch_array($res);
        $dbDataemail = $r['email'];
        $dbDatapass = $r['password'];
        if ($email == $dbDataemail and $encryptionPassword == $dbDatapass) {
            echo "<script>window.location.href='Admindashboard.php' </script>";
        } else {
            echo "<script>alert('wrong username and password')</script>";
            echo "<script>window.location.href='dashboard.php' </script>";
        }
    }
    ?>

</body>

</html>