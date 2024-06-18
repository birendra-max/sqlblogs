<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sql Solutions">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Mr . Narendra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome ! Admin Login</title>
    <link rel="shortcut icon" href="icons/blog.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Header -->
        <meta charSet="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <body class="bg-gray-100 h-screen flex items-center justify-center">
        <!-- component -->
        <div class="h-screen bg-gradient-to-br from-blue-600 to-cyan-300 flex justify-center items-center w-full">

            <form method='POST'>
                <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-xl max-w-sm">
                    <div class="space-y-4">
                        <h1 class="text-center text-2xl font-semibold text-gray-600">Admin Login</h1>
                        <hr>
                        <div class="flex items-center border-2 py-2 px-3 rounded-md mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            <input class="pl-2 outline-none border-none w-full" type="email" name="email" value="" placeholder="Email" required />

                        </div>
                        <div class="flex items-center border-2 py-2 px-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            <input class="pl-2 outline-none border-none w-full" type="password" name="password" id="" placeholder="Password" required />

                        </div>
                    </div>

                    <button type="submit" name="login" value="login" id="login" class="mt-6 w-full shadow-xl bg-gradient-to-tr from-blue-600 to-red-400 hover:to-red-700 text-indigo-100 py-2 rounded-md text-lg tracking-wide transition duration-1000">Login</button>
                    <hr>
                </div>
                <div class="pt-6 text-base font-semibold leading-7">
                    <p class="font-sans text-red-500 text-md hover:text-red-800">
                        <a href="index.php" class="absolute">&larr; Home</a>
                    </p>
                </div>
            </form>
            <?php
            if (array_key_exists("login", $_POST)) {
                error_reporting(0);
                $email = $_POST['email'];
                $password = $_POST['password'];
                $encryptionPassword = md5($password);
                require('logincheck.php');
                check($email, $encryptionPassword);
            }
            ?>
        </div>
    </body>

    </html>
</body>

</html>