<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="icons/logo.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @media screen and(max-width:600px) {
      #webname {
        display: none;
      }
    }
  </style>
</head>

<body>
  <!-- component -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <div>
    <div class="antialiased dark-mode:bg-gray-900">
      <div class="w-full bg-blue-400 dark-mode:text-gray-200 dark-mode:bg-gray-800">
        <div x-data="{ open: true }" class="flex flex-col max-w-screen-xl px-0 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
          <div class="flex flex-row items-center justify-between p-4">
            <img alt="sqltech logo" src="icons/logo.png" class="relative inline-block h-8 w-12 cursor-pointer rounded-full object-cover object-center" data-popover-target="profile-menu" />
            <a href="index.php" target="_blank" id="webname" class="text-1xl ml-2 font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white hover:underline hover:decoration-red-200 focus:outline-none focus:shadow-outline">
              <div class="w-full h-full flex justify-center items-center">
                <h1 id="typewriter" class="text-sm font-bold">sqltecherror.com</h1>
              </div>
            </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <div :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
            <a target="_self" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="index.php">Home</a>
            <a target="_self" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="blog.php?post_id=1">Blogs</a>
            <a target="_self" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="contact.php">Contact</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>