<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
?>

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
    <title>Index Blogs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="icons/logo.png" type="image/x-icon">

    <style>
        #postdiv {
            display: grid;
            justify-content: center;
            align-content: center;
            padding: 2%;
        }

        #ads2 {
            display: none;
        }

        #content h1 {
            font-size: 1.5em;
            font-weight: 700;
            color: black;
        }

        ul {
            list-style-type: disc;
            padding-left: 3%;
        }

        #content h2 {
            font-size: 1.3em;
            font-weight: 700;
            color: black;
            padding: 1%;
        }

        #content p {
            color: black;
            padding: 1%;
            font-size: 1em;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        #content a {
            color: blue;
            text-decoration: underline;
        }

        #content img {
            width: 100%;
            height: 100%;
        }

        code {
            width: 50%;
            font-size: 1em;
            padding: 1%;
            border: 1px solid ghostwhite;
        }

        @media screen and (max-width:600px) {

            #ads2 {
                width: 100%;
                display: block;
            }

            #posts {
                width: 100%;
            }

            #posts2 {
                margin-top: 5%;
            }

            #postdiv {
                width: 100%;
                padding: 1%;
            }

            #author {
                margin-left: 4%;
            }

            #content {
                padding: 1%;
            }


            #content h1 {
                font-size: 1em;
                font-weight: 700;
                color: black;
            }

            #content h2 {
                font-size: 1.2em;
                font-weight: 700;
                color: black;
                padding: 1%;
            }

            #content p {
                color: black;
                font-size: 1em;
                word-wrap: normal;
            }

            ul {
                list-style-type: disc;
                padding-left: 0%;
            }

            #content a {
                color: blue;
                text-decoration: underline;
            }

            #content img {
                width: 100%;
                height: 100%;
            }

        }
    </style>
</head>

<body class="bg-indigo-100" id="body">
    <div class="flex flex-col bg-indigo-100 mt-2">
        <div class="bg-white mt-0">
            <div class="container mx-auto px-0 flex flex-col md:flex-row ">
                <div id="posts" class="w-full md:w-4/4 grid hover:shadow-2xl transition-all duration-300 transform">
                    <?php
                    require("DbConnection.php");
                    $query = "select * from blogs order by blogid desc limit 1;";
                    $res = mysqli_query($conn, $query);
                    if (mysqli_num_rows($res) > 0) {
                        $r = mysqli_fetch_assoc($res);
                    ?>
                        <div id="postdiv" class="border rounded text-black p-2">
                            <h1 class="text-1xl md:text-xl pl-2 my-2 border-l-4  font-sans font-bold border-red-800  dark:text-black-200">
                                <?php echo $r['problem']; ?>
                            </h1>
                            <br>
                            <p class="italic text-gray-800 mb-2 text-sm">Published on <?php echo $r['publish_date']; ?> | By : <a href="#" class="italic text-blue-500 hover:underline"> Mr.Narendra</a> | SQLMaster</p>
                            <hr>
                            <br>
                            <h2 class="text-2xl font-bold text-black mt-3 rounded border border-green-700 p-1">Solution</h2>
                            <div class="prose max-w-none mt-2 text-black">
                                <div id="content" class="rounded-lg border-1 border-purple-600">
                                    <?php echo $r['content'] ?>
                                </div>
                            </div>
                            <form method="post" class="flex flex-col p-4 mx-auto w-full mt-4">
                                <label class="mb-2 font-bold text-lg text-gray-900" for="comment">Leave a Comment:</label>
                                <textarea rows="2" class="mb-4 px-3 py-2 border-2 border-gray-300 rounded-lg" id="comment" name="comment"></textarea>
                                <div class="flex justify-end">
                                    <button name="cStateommentbtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded max-w-[100px]">Submit</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['commentbtn'])) {
                                $comment = $_POST['comment'];
                                $blogid = $r['blogid'];
                                require("DbConnection.php");
                                $query = "insert into comments(blogid,comments)values('$blogid','$comment')";
                                $res = mysqli_query($conn, $query);
                                echo "<script> window.location.href='index.php' </script>";
                            }
                            ?>
                        </div>
                        <?php echo "<br>"; ?>
                    <?php
                    } else {
                        echo "<h1 class='text-3xl text-red-600 flex justify-center mt-44 font-bold'>No Post Found</h1>";
                    }
                    ?>
                </div>

                <div id="posts2" class="w-full md:w-96 md:py-0 py-4 px-2 bg-indigo-100">
                    <div class="bg-slate-50 border mb-2 flex justify-center align-center cursor-pointer hover:shadow-md transition-all duration-300 transform">
                        <header class="px-2 py-4 mt-0 flex flex-col justify-center items-center text-center">
                            <span id="author" class="bg-blue-100 text-black text-sm font-bold me-2 px-2 py-0.2 h-6 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 mr-72 -mt-2">
                                Author </span>
                            <img src="postimages/Author/Auther.jpg" class="rounded-full h-28 w-28" alt="auther" />
                            <h1 class="text-1xl text-black font-bold mt-2">
                                Naren Dahiya
                            </h1>
                            <h2 class="text-base md:text-sm text-black font-bold">
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=nsdahiya8040@gmail.com" target="_blank" class="text-indigo-900 hover:text-indigo-600 font-bold border-b-0 hover:border-b-4 hover:border-b-indigo-300 transition-all mb-2">
                                    nsdahiya8040@gmail.com
                                </a>
                            </h2>
                            <ul class="flex flex-col mt-2">
                                <a href="https://www.linkedin.com/in/narender-dahiya-a09257181?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app " target="_blank" class="px-4 py-2 border flex gap-2 border-slate-200 rounded-lg text-slate-700 hover:border-slate-400 hover:text-slate-900 hover:shadow transition duration-150">
                                    <img class="w-6 h-6" src="https://www.svgrepo.com/show/475661/linkedin-color.svg" loading="lazy" alt="linked in logo">
                                    <span class="pt-0.5">Contact with LinkedIn</span>
                                </a>
                                <a href="https://wa.me/919053942621/?text=Hi Naren, Whatsup" target="_blank" class="mt-2 px-4 py-2 border flex gap-2 border-slate-200 rounded-lg text-slate-700 hover:border-slate-400 hover:text-slate-900 hover:shadow transition duration-150">
                                    <img class="w-8 h-8" src="icons/whatsapp.png" loading="lazy" alt="whatsapp logo">
                                    <span class="pt-0.2">Contact with WhatsApp</span>
                                </a>
                            </ul>
                        </header>
                    </div>

                    <div class="bg-white border p-4 hover:shadow-md transition-all duration-300 transform mt-2">
                        <h1 class="text-2xl md:text-2xl pl-2 my-2 border-l-4  font-sans font-bold border-teal-400  dark:text-black-200">
                            Blogs
                        </h1>
                        <form method="post" class="relative max-w-sm mx-auto mt-7">
                            <input class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" type="search" placeholder="Search" name="serchitem" required>
                            <button name="serchbox" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 bg-gray-100 border border-gray-300 rounded-r-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.795 13.408l5.204 5.204a1 1 0 01-1.414 1.414l-5.204-5.204a7.5 7.5 0 111.414-1.414zM8.5 14A5.5 5.5 0 103 8.5 5.506 5.506 0 008.5 14z" />
                                </svg>
                            </button>
                        </form>
                        <?php
                        if (isset($_POST['serchbox'])) {
                            $search = $_POST['serchitem'];
                        ?>
                            <ul class="mt-5">
                                <?php
                                require("DbConnection.php");
                                $query = "select * from blogs where problem='$search';";
                                $res = mysqli_query($conn, $query) or die("Sorry Blogs are not");
                                if (mysqli_num_rows($res) > 0) {
                                    $r = mysqli_fetch_assoc($res);
                                ?>
                                    <li class="mb-2 ml-5 p-2" type="disc">
                                        <a href="blog.php?post_id=<?php echo $r['blogid']; ?>" class="text-1xl text-blue-700 hover:text-blue-700  hover:underline "><?php echo $r['problem']; ?></a>
                                    </li>
                                <?php } else {
                                    echo "<h1 class='p-4'>Blog Not Found</h1>";
                                }
                                ?>
                            </ul>

                        <?php
                        } else {
                        ?>
                            <ul class="mt-5">
                                <?php
                                require("DbConnection.php");
                                $query = "select blogid,problem from blogs;";
                                $res = mysqli_query($conn, $query);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($r = mysqli_fetch_assoc($res)) {
                                        $blogid = $r['blogid'];
                                ?>
                                        <li class="mb-2 ml-5" type="disc">
                                            <a href="blog.php?post_id=<?php echo $r['blogid']; ?>" class="text-blue-600 hover:text-gray-900 hover:underline text-sm"><?php echo $r['problem']; ?></a>
                                        </li>
                                <?php  }
                                } else {
                                    echo "<h1 class='p-4 text-red-500 font-bold'>Blogs Not Found</h1>";
                                }
                                ?>
                            </ul>

                        <?php
                        }
                        ?>
                    </div>

                    <div class="bg-white border p-4 mt-4 hover:shadow-md transition-all duration-300 transform ">
                        <h1 class="text-lg md:text-1xl pl-2 my-2 border-l-4  font-sans font-bold border-teal-400  dark:text-black-200">
                            Categories
                        </h1>
                        <hr>
                        <br>
                        <ul class="list-none">
                            <li class="mb-2 ml-4" type="disc">
                                <a href="#" class="text-gray-700 hover:text-gray-900">SQLTECH</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="mt-4 bg-white divide-y divide-gray-300 max-w-sm mt-0 mx-auto px-4 border">
                        <h1 class="text-lg md:text-1xl pl-2 my-2 border-l-4  font-sans font-bold border-teal-400  dark:text-black-200">
                            Comments
                        </h1>
                        <?php
                        if (isset($GLOBALS['blogid'])) {
                            $blogid = $GLOBALS['blogid'];
                            require("DbConnection.php");
                            $query = "select * from comments where blogid=$blogid;";
                            $res = mysqli_query($conn, $query);
                            if (mysqli_num_rows($res) > 0) {
                                while ($d = mysqli_fetch_assoc($res)) {
                                    if ($d['Replay'] != "") {
                        ?>
                                        <li class="py-4">
                                            <h1>Comment</h1>
                                            <ul class="divide-y bg-green-100 px-4 py-0 mt-2">
                                                <li class="py-2">
                                                    <div class="flex items-center space-x-4">
                                                        <span class="text-md font-medium"><?php echo $d['comments'] ?></span>
                                                    </div>
                                                </li>
                                            </ul>

                                            <h1 class="ml-7">Replay</h1>
                                            <ul class="ml-7 divide-y divide-gray-300 bg-blue-100 px-4 py-0 mt-2">
                                                <li class="py-2">
                                                    <div class="flex items-center space-x-4">
                                                        <span class="text-md font-medium"><?php echo $d['Replay'] ?></span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                <?php
                                    }
                                }
                            } else {
                                ?>
                                <h1 class="p-4">No Comments</h1>
                        <?php }
                        } else {
                            echo "<h1 class='p-4'>No Comments</h1>";
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
        <h2 class="font-bold text-3xl">Latest blog</h2>
        <a href="blog.php?post_id=<?php echo $GLOBALS['blogid']; ?>" class="bg-gray-200 hover:bg-green-200 text-gray-800 px-3 py-1 rounded cursor-pointer">
            View all
        </a>
    </div>
    <div id="lastposts" class="relative block w-full text-base font-regular rounded-lg bg-gradient-to-r from-green-50/50 via-teal-50 to-green-50/50 text-white flex hover:shadow-2xl transition-all duration-300 transform">
        <div class="container max-w-6xl mx-auto w-full px-2 py-2 flex flex-wrap justify-center align-center">
            <?php
            require("DbConnection.php");
            $query = "select * from blogs order by blogid DESC LIMIT 3;";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                while ($r = mysqli_fetch_assoc($res)) {
            ?>
                    <div class="w-full md:w-1/3 px-2 mb-8" title="<?php echo $r['problem']; ?>">
                        <div class="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth ">
                            <div class="h-full bg-white shadow-md border border-gray-200 rounded-lg dark:bg-white dark:border-gray-700 ">
                                <a href="blog.php?post_id=<?php echo $r['blogid']; ?>">
                                    <?php
                                    if ($r['image_path'] == null) {
                                    } else {
                                    ?>
                                        <img class="w-full" src="<?php echo $r['image_path']; ?>" alt="<?php echo $r['image_path']; ?>">
                                    <?php  } ?>
                                </a>
                                <div class="p-5 text">
                                    <a href="blog.php?post_id=<?php echo $r['blogid']; ?>">
                                        <h5 class="text-gray-900 font-bold text-sm tracking-tight mb-2 dark:text-white"><?php echo $r['problem'] ?></h5>
                                    </a>
                                    <div class="pt-2 pr-0 pb-0 pl-0 text-black flex justify-between align-center">
                                        <a class="inline text-1xl font-medium mt-0 mr-1 mb-0 ml-0 underline">Mr.Narendra</a>
                                        <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-1"><?php echo $r['publish_date']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <h1 class="text-2xl text-red-400 font-bold">No Posts found</h1>
            <?php } ?>
        </div>
    </div>
</body>

</html>