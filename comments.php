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
    <title>Welcome ! SqlTechError Comments Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="icons/logo.png" type="image/x-icon">
</head>

<body>
    <div id="comments" class="h-full p-2">
        <div class="flex items-center py-2">
            <div class="w-full bg-white rounded-lg border p-2 my-4 mx-6">
                <p class="text-lg font-medium">Comments</p>
                <?php
                require("DbConnection.php");
                $query = "select * from comments where Replay=' ';";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                    while ($r = mysqli_fetch_assoc($res)) {
                ?>
                        <form method="post">
                            <div class="flex flex-col">
                                <div class="border rounded-md p-3 ml-3 my-3">
                                    <div class="flex gap-3 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                        <h3 class="font-bold">
                                            Unknown
                                        </h3>
                                    </div>
                                    <p class="text-gray-600 mt-2">
                                        <?php echo $r['comments']; ?>
                                    </p>

                                </div>
                            </div>
                            <div class="w-full px-3 my-2">
                                <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="replay" placeholder='Type Your Replay' required></textarea>
                            </div>

                            <div class="w-full flex justify-end px-3">
                                <input type='submit' name="replaybtn" class="cursor-pointer px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" value='Post Comment'>
                            </div>
                        </form>
                <?php  }
                } else {
                    echo "<h1 class='p-4 text-red-500 font-bold'>No Comments</h1>";
                }
                ?>
            </div>
            <?php
            if (isset($_POST['replaybtn'])) {
                $replay = $_POST['replay'];
                require("DbConnection.php");
                $query = "update comments set Replay='$replay';";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    echo "<script> alert('Successfuly Posted'); </script>";
                    echo "<script>
                                        window.location.href='Admindashboard.php';
                                        </script>";
                } else {
                    echo "<script> alert('Somthing is wrong'); </script>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>