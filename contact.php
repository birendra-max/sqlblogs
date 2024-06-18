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
    <title>Welcome ! SQLTECH Contact Page</title>
    <link rel="shortcut icon" href="icons/blog.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="py-2 bg-black text-white">
        <div class="mt-4 mb-2 max-w-3xl text-center sm:text-center md:mx-auto md:mb-4">
            <p class="text-base font-semibold uppercase tracking-wide text-blue-600 dark:text-blue-200">
                Contact
            </p>
            <h2 class="font-heading font-bold tracking-tight text-white dark:text-white text-3xl sm:text-5xl">
                Get in Touch
            </h2>
        </div>
        <div class="container mx-auto flex flex-col md:flex-row my-12 md:my-2 dark:text-white">
            <div class="flex flex-col w-full lg:w-2/5 p-8">
                <form method="post" class="relative border-8 border-neutral-900 p-6 rounded-lg grid gap-8 md:flex-1 md:max-w-lg -my-12 md:my-12 lg:my-16 bg-white dark:bg-neutral-800 w-full">
                    <h2 id="contact" class="text-3xl font-bold text-black dark:text-white">Let's Connect</h2>
                    <div class="relative">
                        <input type="text" id="username" name="username" placeholder="Your Name" class="peer w-full py-2 border-4 border-amber-400 rounded-md focus:ring-4 dark:focus:ring-offset-2 focus:ring-amber-400 focus:border-amber-400 focus:outline-none dark:bg-amber-400 dark:text-neutral-900 placeholder-transparent text-black" required>
                        <label for="name" class="text-neutral-500 text-sm font-bold uppercase absolute -top-4 left-2 -translate-y-1/2 transition-all peer-placeholder-shown:left-4 peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-neutral-900 peer-focus:-top-4 peer-focus:left-2 peer-focus:text-neutral-600 dark:peer-focus:text-neutral-300 ">Your
                            Name
                        </label>
                    </div>
                    <div class="relative">
                        <input type="text" id="email" name="email" placeholder="Your Email" class=" peer w-full py-2 border-4 border-amber-400 rounded-md focus:ring-4 dark:focus:ring-offset-2 focus:ring-amber-400 focus:border-amber-400 focus:outline-none dark:bg-amber-400 dark:text-neutral-900 placeholder-transparent text-black" required>
                        <label for="email" class=" text-neutral-500 text-sm font-bold uppercase absolute -top-4 left-2 -translate-y-1/2 transition-all peer-placeholder-shown:left-4 peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-neutral-900 peer-focus:-top-4 peer-focus:left-2 peer-focus:text-neutral-600 dark:peer-focus:text-neutral-300 ">Your
                            Email
                        </label>
                    </div>

                    <div class="relative">
                        <textarea name="content" id="content" cols="20" rows="5" placeholder="How can we help?" class=" peer form-textarea resize-none w-full border-4 border-amber-400 rounded-md focus:ring-4 dark:focus:ring-offset-2 focus:ring-amber-400 focus:border-amber-400 focus:outline-none dark:bg-amber-400 dark:text-neutral-900 placeholder-transparent text-black"></textarea required>
                        <label for="content" class=" text-neutral-500 text-sm font-bold uppercase absolute -top-3 left-2 -translate-y-1/2 transition-all peer-placeholder-shown:left-4 peer-placeholder-shown:top-6 peer-placeholder-shown:text-neutral-900 peer-focus:-top-4 peer-focus:left-2 peer-focus:text-neutral-600 dark:peer-focus:text-neutral-300 ">How
                            can we help?
                        </label>
                    </div>
                    <button type="submit" name="contactme" class=" py-2 px-6 bg-neutral-900 text-white w-max shadow-xl hover:shadow-none transition-shadow focus:outline-none focus-visible:ring-4 ring-neutral-900 rounded-md ring-offset-4 ring-offset-white dark:ring-offset-amber-400 ">
                        Send
                    </button>
                </form>
            </div>
            <div class=" flex flex-col lg:w-3/5 justify-center w-full lg:-mt-12">
                <div class="container">
                    <div class="relative flex flex-col min-w-0 break-words w-full">
                        <div class="flex-auto p-5 lg:p-10">
                            <img src="https://user-images.githubusercontent.com/54521023/152731049-cc744a56-1d6f-4945-9566-0fa3b7ad1d24.png" alt="contact image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
error_reporting(0);
if (isset($_POST['contactme'])) {

    require("DbConnection.php");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo $username = $_POST['username'];
        echo $email = $_POST['email'];
        echo $content = $_POST['content'];

        $stmt = $conn->prepare("INSERT INTO contactinfo (username,email ,content ) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $content);


        // Execute the query
        if ($stmt->execute()) {

            $to = "nsdahiya8040@gmail.com";
            $subject = "SqlTechError New Mail";
            $message = $_POST['content'];

            // Additional headers
            $headers = "From: $email";

            // Send email
            $mail_success = mail($to, $subject, $message, $headers);

            if ($mail_success) {
                echo "<script>alert(' Mail sent successfully !')</script>.";
                echo "<script>window.location.href='contact.php'</script>";
            } else {
                echo "<script>alert(' Somthing is worong !')</script>.";
            }
        } else {
            echo "<script>alert('Somthing is Wrong !')</script>";
            echo "<script>window.location.href='contact.php'</script>";
        }
    }

    // Close the connection
    // $stmt->close();
    // $conn->close();
}
?>

</html>