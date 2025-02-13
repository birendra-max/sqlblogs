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
    <title>Welcome ! SqlTechError Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="icons/logo.png" type="image/x-icon">
    <style>
        #blogid {
            display: none;
        }

        @media screen and (max-width:600px) {
            #blogid {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Table -->
    <div class="mt-12 overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 p-8 ">
            <thead id="thead" class="bg-gray-50">
                <tr>
                    <th scope="col" class="py-4 font-blod text-black">Blog Id</th>
                    <th scope="col" class="px-6 py-4 font-blod text-black">Blog Problem</th>
                    <th scope="col" class="px-6 py-4 font-blod text-black">Public Date</th>
                    <th scope="col" class="px-6 py-4 font-blod text-black">Category</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <?php
                require("DbConnection.php");
                $query = "select * from blogs;";
                $res = mysqli_query($conn, $query);
                if (mysqli_num_rows($res) > 0) {
                    while ($r = mysqli_fetch_assoc($res)) {
                        $blogid = $r['blogid'];
                ?>
                        <form method="post">
                            <tr class="hover:bg-gray-50 ml-4">
                                <th class="flex gap-3 px-6 py-4 font-blod text-gray-900 ">
                                    <?php echo $blogid; ?>
                                    <input name="blogid" id="blogid" type="text" value=" <?php echo $blogid; ?>">
                                </th>
                                <td class="px-6 py-4">
                                    <p class="w-96 inline-flex items-center gap-1  px-2 py-1 text-sm  text-black">
                                        <?php echo $r['problem']; ?>
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="max-w-sm inline-flex items-center gap-1  px-2 py-1 text-sm  text-black">
                                        <?php echo $r['publish_date']; ?>
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="max-w-sm inline-flex items-center gap-1  px-2 py-1 text-sm  text-black">
                                        <?php echo $r['category']; ?>
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-4">
                                        <button name="deleteblog" x-data="{ tooltip: 'Delete' }" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                        <a x-data="{ tooltip: 'Edite' }" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </form>
                <?php
                    }
                } else {
                    echo "<h1 class='text-3xl text-red-600 flex justify-center mt-12 font-bold'>No Blogs Found</h1>";
                    echo "<script>document.getElementById('thead').style.display='none' </script>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>