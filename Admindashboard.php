<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="icons/logo.png" type="image/x-icon">
    <style>
        :root {
            font-family: 'Source Sans Pro';
        }

        main {
            background-color: gainsboro;
        }

        #div {
            display: flex;
            justify-content: space-around;
            align-items: start;
        }

        #right {
            width: 40%;
            min-height: 10%;
            /* border: 1px solid red; */
        }

        #left {
            width: 60%;
            min-height: 10%;
            /* border: 1px solid red; */
            margin-top: 2%;
        }


        @media screen and (max-width:600px) {
            #comments {
                width: 100%;
            }

            #div {
                display: grid;
                justify-content: center;
                align-content: center;
            }

            #right {
                width: 100%;
                min-height: 10%;
                /* border: 1px solid red; */
            }

            #left {
                width: 100%;
                min-height: 10%;
                /* border: 1px solid red; */
                margin-top: 2%;
            }
        }
    </style>
</head>

<body>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;1,600&display=swap" rel="stylesheet" />
    <?php
    include("header.php");
    ?>
    <main>
        <div id="div">
            <div id="right">
                <?php
                include("comments.php");
                ?>
            </div>
            <div id="left">
                <?php
                include("blogwriteform.php");
                ?>
            </div>
        </div>
        <div id="datatable">
            <?php
            include("datatabel.php");
            ?>
        </div>
    </main>
    <?php
    if (isset($_POST['deleteblog'])) {
        $blogid = $_POST['blogid'];
        require("DbConnection.php");
        $query = "delete from blogs where blogid=$blogid";
        $res = mysqli_query($conn, $query);
        if ($res) {
            echo "<script> alert('Successfuly Deleted Blog ! '); </script>";
            echo "<script>
            window.location.href='Admindashboard.php';
            </script>";
        } else {
            echo "<script> alert('Somthing is wrong'); </script>";
            echo "<script>
            window.location.href='Admindashboard.php';
            </script>";
        }
    }
    ?>
    <?php
    include("footer.php");
    ?>
</body>

</html>