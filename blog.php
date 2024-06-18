<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome ! SQLTECH BLOGS</title>
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
    <link rel="shortcut icon" href="icons/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" /> <!--Replace with your tailwind.css once created-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
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

<body class="bg-white font-sans leading-normal tracking-normal">

    <!--Nav-->
    <header>
        <?php
        include("header.php");
        ?>
    </header>
    <main class="p-4">
        <!-- component -->
        <div class="max-w-screen-lg mx-auto">
            <div class="mt-2">
                <?php
                $blogid = $_GET['post_id'];
                require("DbConnection.php");
                $query = "select * from blogs where blogid='$blogid';";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                    while ($da = mysqli_fetch_assoc($res)) {
                        $dbimgpath = $da['image_path'];
                ?>
                        <!-- featured section -->
                        <div class="flex flex-wrap md:flex-no-wrap space-x-0 md:space-x-6 mb-16">
                            <!-- main post -->
                            <div class="mb-4 lg:mb-0  p-4 lg:p-0 w-full md:w-4/7 relative rounded block">
                                <?php
                                if ($da['image_path'] == null) {
                                } else {
                                ?>
                                    <img class="h-96 w-full" src="<?php echo $da['image_path']; ?>" alt="<?php echo $da['image_path']; ?>">
                                <?php  } ?>
                                <span class="text-green-700 text-sm hidden md:block mt-4"> sqltecherror </span>
                                <h1 class="text-gray-800 md:text-2xl font-bold mt-2 mb-2 leading-tight">
                                    <?php echo $da['problem']; ?>
                                </h1>
                                <div id="content">
                                    <?php echo $da['content'] ?>
                                </div>
                            </div>
                        </div>
                        <!-- end featured section -->
                <?php
                    }
                }
                ?>
                <!-- recent posts -->
                <div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
                    <h2 class="font-bold text-3xl">Latest Blogs</h2>
                    <a href="#allblogs" class="bg-gray-200 hover:bg-green-200 text-gray-800 px-3 py-1 rounded cursor-pointer">
                        View all
                    </a>
                </div>
                <div class="block space-x-0 lg:flex lg:space-x-6">
                    <?php
                    require("DbConnection.php");
                    $query = "select * from blogs order by blogid DESC LIMIT 3;";
                    $res = mysqli_query($conn, $query);
                    if (mysqli_num_rows($res) > 0) {
                        while ($r = mysqli_fetch_assoc($res)) {
                    ?>
                            <div class="w-full md:w-1/3 px-2 mt-2 ">
                                <div class="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth ">
                                    <div class="h-full bg-white shadow-md border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700 ">
                                        <a href="blog.php?post_id=<?php echo $r['blogid']; ?>">
                                            <?php
                                            if ($r['image_path'] == null) {
                                            } else {
                                            ?>
                                                <img src="<?php echo $r['image_path']; ?>" alt="<?php echo $r['image_path']; ?>">
                                            <?php  } ?>
                                        </a>
                                        <div class="p-5">
                                            <a href="blog.php?post_id=<?php echo $r['blogid']; ?>">
                                                <h5 class="text-gray-900 font-bold text-sm tracking-tight mb-2 dark:text-white"><?php echo $r['problem'] ?></h5>
                                            </a>
                                            <div class="pt-2 pr-0 pb-0 pl-0 text-black flex justify-between align-center">
                                                <a class="inline text-1xl font-medium mt-0 mr-1 mb-0 ml-0 underline">Mr.Narendra</a>
                                                <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-1">· <?php echo $r['publish_date']; ?> ·</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!-- end recent posts -->

                <!-- subscribe -->
                <div class="rounded flex md:shadow mt-12">
                    <img src="https://images.unsplash.com/photo-1579275542618-a1dfed5f54ba?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="w-0 md:w-1/4 object-cover rounded-l" />
                    <div class="px-4 py-2">
                        <h3 class="text-3xl text-gray-800 font-bold">Subscribe to newsletter</h3>
                        <p class="text-xl text-gray-700">We sent latest news and posts once in every week, fresh from the oven</p>
                        <form class="mt-4 mb-10">
                            <input type="email" class="rounded bg-gray-100 px-4 py-2 border focus:border-green-400" placeholder="john@tech.com" />
                            <button class="px-4 py-2 rounded bg-green-800 text-gray-100">
                                Subscribe
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                            <p class="text-green-900 opacity-50 text-sm mt-1">No spam. We promise</p>
                        </form>
                    </div>
                </div>
                <!-- ens subscribe section -->



                <!-- popular posts -->
                <div id="allblogs" class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
                    <h2 class="font-bold text-3xl">All blogs</h2>
                </div>
                <div class="block space-x-0 lg:flex lg:space-x-6">
                    <?php
                    require("DbConnection.php");
                    $query = "select * from blogs;";
                    $res = mysqli_query($conn, $query);
                    if (mysqli_num_rows($res) > 0) {
                        while ($r = mysqli_fetch_assoc($res)) {
                    ?>
                            <div class="w-full md:w-1/3 px-2 mt-2" title="<?php echo $r['blogid']; ?>">
                                <div class="h-full bg-white rounded overflow-hidden shadow-md hover:shadow-lg relative smooth ">
                                    <div class="h-full bg-white shadow-md border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700 ">
                                        <a href="blog.php?post_id=<?php echo $r['blogid']; ?>">
                                            <?php
                                            if ($r['image_path'] == null) {
                                            } else {
                                            ?>
                                                <img src="<?php echo $r['image_path']; ?>" alt="<?php echo $r['image_path']; ?>">
                                            <?php  } ?>
                                        </a>
                                        <div class="p-5">
                                            <a href="blog.php?post_id=<?php echo $r['blogid']; ?>">
                                                <h5 class="text-gray-900 font-bold text-sm tracking-tight mb-2 dark:text-white"><?php echo $r['problem'] ?></h5>
                                            </a>
                                            <div class="pt-2 pr-0 pb-0 pl-0 text-black flex justify-between align-center">
                                                <a class="inline text-1xl font-medium mt-0 mr-1 mb-0 ml-0 underline">Mr.Narendra</a>
                                                <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-1">· <?php echo $r['publish_date']; ?> ·</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!-- end popular posts -->

            </div>
            <!-- main ends here -->
        </div>

    </main>
    <!--   Scroll Top Button  -->
    <footer class="bg-gray-900">
        <?php
        include("footer.php");
        ?>
    </footer>

    <script>
        /* Progress bar */
        //Source: https://alligator.io/js/progress-bar-javascript-css-variables/
        var h = document.documentElement,
            b = document.body,
            st = 'scrollTop',
            sh = 'scrollHeight',
            progress = document.querySelector('#progress'),
            scroll;
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");

        document.addEventListener('scroll', function() {

            /*Refresh scroll % width*/
            scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
            progress.style.setProperty('--scroll', scroll + '%');

            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 100) {
                header.classList.remove("hidden");
                header.classList.remove("fadeOutUp");
                header.classList.add("slideInDown");
            } else {
                header.classList.remove("slideInDown");
                header.classList.add("fadeOutUp");
                header.classList.add("hidden");
            }

        });

        // scroll to top	
        const t = document.querySelector(".js-scroll-top");
        if (t) {
            t.onclick = () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                })
            };
            const e = document.querySelector(".scroll-top path"),
                o = e.getTotalLength();
            e.style.transition = e.style.WebkitTransition = "none", e.style.strokeDasharray = `${o} ${o}`, e.style.strokeDashoffset = o, e.getBoundingClientRect(), e.style.transition = e.style.WebkitTransition = "stroke-dashoffset 10ms linear";
            const n = function() {
                const t = window.scrollY || window.scrollTopBtn || document.documentElement.scrollTopBtn,
                    n = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight),
                    s = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
                var l = o - t * o / (n - s);
                e.style.strokeDashoffset = l
            };
            n();
            const s = 100;
            window.addEventListener("scroll", (function(e) {
                n();
                (window.scrollY || window.scrollTopBtn || document.getElementsByTagName("html")[0].scrollTopBtn) > s ? t.classList.add("is-active") : t.classList.remove("is-active")
            }), !1)
        }
    </script>

</body>

</html>