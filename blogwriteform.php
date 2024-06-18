<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Welcome To sqltecherror.com</title>
    <link rel="shortcut icon" href="icons/logo.png" type="image/x-icon">
</head>

<body>
    <!-- Blog Form -->
    <div class="max-w-5xl h-full mx-auto sm:px-2 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <p class="text-lg font-medium p-4 ">Write Your blog</p>
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Problem <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="problem" id="title" value="" required>
                    </div>
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Category <span class="text-red-500">*</span></label></br>
                        <select name="category" class="border-2 border-gray-300 p-2 w-full" id="category">
                            <option>Select</option>
                            <option value="SQLTECH">SQLTECH</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="text-xl text-gray-600">keyword</label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="keyword" id="description" placeholder="(Optional)">
                    </div>
                    <div class="w-full flex flex-col flex-grow mb-3">
                        <label class="text-xl text-gray-600">Poster</label></br>
                        <div x-data="{ files: null }" id="FileUpload" class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                            <input type="file" name="poster" class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0" x-on:change="files = $event.target.files; console.log($event.target.files);" x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')" required>
                            <template x-if="files !== null">
                                <div class="flex flex-col space-y-1">
                                    <template x-for="(_,index) in Array.from({ length: files.length })">
                                        <div class="flex flex-row items-center space-x-2">
                                            <template x-if="files[index].type.includes('audio/')"><i class="far fa-file-audio fa-fw"></i></template>
                                            <template x-if="files[index].type.includes('application/')"><i class="far fa-file-alt fa-fw"></i></template>
                                            <template x-if="files[index].type.includes('image/')"><i class="far fa-file-image fa-fw"></i></template>
                                            <template x-if="files[index].type.includes('video/')"><i class="far fa-file-video fa-fw"></i></template>
                                            <span class="font-medium text-gray-900" x-text="files[index].name">Uploading</span>
                                            <span class="text-xs self-end text-gray-500" x-text="filesize(files[index].size)">...</span>
                                        </div>
                                    </template>
                                </div>
                            </template>
                            <template x-if="files === null">
                                <div class="flex flex-col space-y-2 items-center justify-center">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                                    <p class="text-gray-700">Drag your files here or click in this area.</p>
                                    <a href="javascript:void(0)" class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-red-700">Select
                                        a file</a>
                                </div>
                            </template>
                        </div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
                    <script src="https://cdn.filesizejs.com/filesize.min.js"></script>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet" />
                    <div class="mb-8">
                        <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                        <textarea name="content" class="border-2 border-gray-500">

                        </textarea>
                    </div>

                    <div class="flex p-1">
                        <button role="reset" type="reset" class="p-3 bg-blue-500 text-white hover:bg-red-800" required>Reset</button>
                        <button type="submit" role="submit" name="blogbtn" class="ml-4 p-3 bg-blue-500 text-white hover:bg-yellow-400" required>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
    </div>
</body>
<?php
if (isset($_POST['blogbtn'])) {
    require("DbConnection.php");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve blog data from the form
        $category = $_POST['category'];
        $problem = $_POST['problem'];
        $date = date('d-M-Y');
        $content = $_POST['content'];
        $keywords = $_POST['keyword'];
        $imgname = $_FILES['poster']['name'];
        $imgtmpname = $_FILES['poster']['tmp_name'];
        $path = "postimages/" . $imgname;

        $stmt = $conn->prepare("INSERT INTO blogs (problem,publish_date,category,image_path,keywords,content) VALUES (?, ?, ?, ?, ?,?)");

        $stmt->bind_param("ssssss", $problem, $date, $category, $path, $keywords, $content);

        if ($stmt->execute()) {
            echo "<script>alert('Successfuly Posted !')</script>";
            move_uploaded_file($imgtmpname, $path);
            echo "<script>window.location.href='Admindashboard.php'</script>";
        } else {
            echo "<script>alert('Somthing is Wrong !')</script>";
            echo "<script>window.location.href='Admindashboard.php'</script>";
        }
    }
    $stmt->close();
    $conn->close();
}
?>

</html>