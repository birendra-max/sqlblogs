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
    <title>Welcome ! SqlTechError Blogs Page</title>
    <link rel="shortcut icon" href="icons/logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        main {
            width: 100%;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: start;
            flex-wrap: wrap-reverse;
        }

        #blog {
            width: 90%;
            /* border: 1px solid red; */
        }

        #ads1 {
            display: none;
            width: 15%;
            /* border: 1px solid red; */
        }

        #ads1 img {
            width: 100%;
            height: 100%;
        }

        #auteher {
            width: 90%;
            margin: auto;
        }

        @media screen and (max-width:600px) {
            #webname {
                display: none;
            }

            main {
                width: 100%;
                margin: auto;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                flex-wrap: wrap-reverse;
            }

            #blog {
                width: 100%;
            }

            #ads1 {
                width: 100%;
                margin-top: -1%;
                padding: 2%;
            }

            #ads1 img {
                width: 100%;
                height: 100%;
            }

        }
    </style>
</head>

<body>
    <header>
        <?php
        include('header.php');
        ?>
    </header>
    <main>
        <div id="ads1" class="mt-10">

        </div>
        <div id="blog">
            <div id="myblog">
                <?php
                include("indexblog.php")
                ?>
            </div>
        </div>
    </main>

    <footer>
        <?php
        include("footer.php");
        ?>
    </footer>
</body>

</html>