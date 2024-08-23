<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <script src='https://cdn.tailwindcss.com/'></script>
</head>

<body>
    <!-- Menu Above Medium Screen -->
    <div class="bg-white  shadow w-full z-30 flex justify-between items-center fixed  top-0  ">
        <!-- Brand Logo / Name -->
        <div class="flex items-center px-6 py-3 h-16  ">
            <div class="text-2xl font-medium  tracking-tight text-gray-800">
                Dashing Admin
            </div>
        </div>
        <!-- @end Brand Logo / Name -->

        <div class="px-4 py-2">
            <ul class="flex justify-end gap-5 items-center">
                <li>
                    <a href="index.php" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
                        Home
                    </a>
                </li>

                <li>
                    <a href="user.php" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
                        User
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!-- @end Menu Above Medium Screen -->
</body>

</html>