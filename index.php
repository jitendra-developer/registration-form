<?php

require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $number = $_POST['number'];
  $dob = $_POST['dob'];
  $subject = $_POST['subject'];
  $gender = $_POST['gender'];
  $file = $_FILES['file'];
  $message = $_POST['message'];

  print_r($file);

  $fileName = $file['name'];
  $fileTmp = $file['tmp_name'];
  $fileErr = $file['error'];

  // Set target directory
  $uploadDir = 'uploads/';
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
  }

  // Set target file path
  $filePath = $uploadDir . basename($fileName);

  $image = move_uploaded_file($fileTmp, $filePath);

  if (empty($name) || empty($email) || empty($password)) {
  }


  $sql = "INSERT INTO `admission_crud` (`name`, `email`, `password`, `number`, `dob`, `subject`, `gender`,`message`)  VALUES ('$name','$email','$password','$number','$dob','$subject',  $gender','$message')";

  $result = mysqli_query($conn, $sql);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registretion Form</title>
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <script src="https://cdn.tailwindcss.com/"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


    * {
      font-family: 'poppins';
    }
  </style>
</head>

<body class="antialiased bg-gray-200">
  <div x-data="{ sidemenu: false }" class="h-screen flex overflow-hidden" x-cloak @keydown.window.escape="sidemenu = false">
    <div class="md:hidden">
      <div @click="sidemenu = false" class="fixed inset-0 z-30 bg-gray-600 opacity-0 pointer-events-none transition-opacity ease-linear duration-300" :class="{'opacity-75 pointer-events-auto': sidemenu, 'opacity-0 pointer-events-none': !sidemenu}"></div>

      <!-- Small Screen Menu -->
      <div class="fixed inset-y-0 left-0 flex flex-col z-40 max-w-xs w-full bg-white transform ease-in-out duration-300 -translate-x-full" :class="{'translate-x-0': sidemenu, '-translate-x-full': !sidemenu}">
        <!-- Brand Logo / Name -->
        <div class="flex items-center px-6 py-3 h-16">
          <div class="text-2xl font-medium  tracking-tight text-gray-800">
            Dashing Admin.
          </div>
        </div>
        <!-- @end Brand Logo / Name -->

        <div class="px-4 py-2 flex-1 h-0 overflow-y-auto">
          <ul>
            <li>
              <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                  <rect x="4" y="4" width="6" height="6" rx="1" />
                  <rect x="14" y="4" width="6" height="6" rx="1" />
                  <rect x="4" y="14" width="6" height="6" rx="1" />
                  <rect x="14" y="14" width="6" height="6" rx="1" />
                </svg>
                Dashboard
              </a>
            </li>

            <li>
              <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                  <line x1="4" y1="19" x2="20" y2="19" />
                  <polyline points="4 15 8 9 12 11 16 6 20 10" />
                </svg>
                Analytics
              </a>
            </li>

            <li>
              <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                  <polyline points="14 3 14 8 19 8" />
                  <path d="M17 21H7a2 2 0 0 1 -2 -2V5a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                  <line x1="9" y1="9" x2="10" y2="9" />
                  <line x1="9" y1="13" x2="15" y2="13" />
                  <line x1="9" y1="17" x2="15" y2="17" />
                </svg>
                Invoices
              </a>
            </li>

            <li>
              <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-blue-700 hover:text-blue-600 hover:bg-gray-200 bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                  <circle cx="12" cy="12" r="9" />
                  <polyline points="12 7 12 12 9 15" />
                </svg>
                Tracking
              </a>
            </li>

            <li>
              <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                  <path d="M16 6h3a 1 1 0 011 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
                  <line x1="8" y1="8" x2="12" y2="8" />
                  <line x1="8" y1="12" x2="12" y2="12" />
                  <line x1="8" y1="16" x2="12" y2="16" />
                </svg>
                History
              </a>
            </li>

            <li>
              <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                  <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                  <circle cx="12" cy="12" r="3" />
                </svg>
                Settings
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- @end Small Screen Menu -->
    </div>

    <!-- Menu Above Medium Screen -->
    <div class="bg-white w-64 min-h-screen overflow-y-auto hidden md:block shadow relative z-30">
      <!-- Brand Logo / Name -->
      <div class="flex items-center px-6 py-3 h-16">
        <div class="text-2xl font-medium  tracking-tight text-gray-800">
          Dashing Admin.
        </div>
      </div>
      <!-- @end Brand Logo / Name -->

      <div class="px-4 py-2">
        <ul>
          <li>
            <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <rect x="4" y="4" width="6" height="6" rx="1" />
                <rect x="14" y="4" width="6" height="6" rx="1" />
                <rect x="4" y="14" width="6" height="6" rx="1" />
                <rect x="14" y="14" width="6" height="6" rx="1" />
              </svg>
              Dashboard
            </a>
          </li>

          <li>
            <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <line x1="4" y1="19" x2="20" y2="19" />
                <polyline points="4 15 8 9 12 11 16 6 20 10" />
              </svg>
              Analytics
            </a>
          </li>

          <li>
            <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <polyline points="14 3 14 8 19 8" />
                <path d="M17 21H7a2 2 0 0 1 -2 -2V5a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                <line x1="9" y1="9" x2="10" y2="9" />
                <line x1="9" y1="13" x2="15" y2="13" />
                <line x1="9" y1="17" x2="15" y2="17" />
              </svg>
              Invoices
            </a>
          </li>

          <li>
            <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-blue-600 hover:text-blue-600 hover:bg-gray-200 bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <circle cx="12" cy="12" r="9" />
                <polyline points="12 7 12 12 9 15" />
              </svg>
              Tracking
            </a>
          </li>

          <li>
            <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <path d="M16 6h3a 1 1 0 011 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
                <line x1="8" y1="8" x2="12" y2="8" />
                <line x1="8" y1="12" x2="12" y2="12" />
                <line x1="8" y1="16" x2="12" y2="16" />
              </svg>
              History
            </a>
          </li>

          <li>
            <a href="#" class="mb-1 px-2 py-2 rounded-lg flex items-center font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 opacity-50" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <circle cx="12" cy="12" r="3" />
              </svg>
              Settings
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- @end Menu Above Medium Screen -->


    <div class="w-full flex-1 flex-col py-10 overflow-y-scroll ">

      <div class=" md:max-w-[800px] w-full mx-auto relative z-0 ">
        <div class="w-full">
          <form method="post" class="bg-[#f0f8ff] px-5 py-4" id="form" enctype="multipart/form-data">
            <h1 class="py-3 text-center text-4xl">Registretion Form</h1>
            <div>
              <span class="uppercase text-gray-600 font-medium ">Full Name</span>
              <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation " name="name" type="text">
            </div>

            <div class="mt-8">
              <span class="uppercase text-gray-600 font-medium ">Email</span>
              <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation" name="email" required type="email">
            </div>

            <div class="mt-8">
              <span class="uppercase text-gray-600 font-medium ">Password</span>
              <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation" name="password" required type="password">
            </div>

            <div class="mt-8">
              <span class="uppercase text-gray-600 font-medium ">Number</span>
              <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation" name="number" required type="number">
            </div>

            <div class="mt-8">
              <span class="uppercase text-gray-600 font-medium ">DOB</span>
              <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation" name="dob" required type="date">
            </div>

            <div class="mt-8">
              <span class="uppercase text-gray-600 font-medium ">Subject</span>
              <select name="subject" class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline " id="subject">
                <option name="subject" value="">Select</option>
                <option name="subject" value="art">Art</option>
                <option name="subject" value="maths">Maths</option>
                <option name="subject" value="science">Science</option>
                <option name="subject" value="biology">Biology</option>
              </select>
            </div>

            <div class="mt-8">
              <span class="uppercase text-gray-600 font-medium  w-full block mb-3">Gender</span>
              <div class="flex items-center gap-4">
                <div class="flex items-center gap-3 ms-4">
                  <span class="uppercase font-normal ">Male</span>
                  <input class=" mx-2" name='gender' value="male" required type="radio">
                </div>
                <div class="flex items-center gap-3">
                  <span class="uppercase font-normal">Female</span>
                  <input class=" mx-2" name='gender' value='female' required type="radio">
                </div>
              </div>
            </div>

            <div class="mt-8">
              <span class="uppercase text-gray-600 font-medium ">File</span>
              <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation " name='file' required type="file">
            </div>

            <div class="mt-8">
              <span class="uppercase text-gray-600 font-medium ">Message</span>
              <textarea class="w-full h-32 bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" name="message"></textarea>
            </div>
            <div class="mt-8">
              <button class="uppercase font-medium  tracking-wide bg-indigo-500 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline " id="submit" role='submit'>
                Send Message
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  </div>


  <script>
    let inputs = document.querySelectorAll('.input-validation');
    let submit = document.getElementById('submit');

    submit.addEventListener("click", (e) => {
      console.log(this);
      handleInputs();
      // e.preventDefault()
    });

    function handleInputs() {
      let isEmpty = [];

      inputs.forEach((input) => {
        if (!input.value) {
          isEmpty = [...isEmpty, input.name]
        }
      })

      console.log(isEmpty);
      if (isEmpty.length < 0) {
        alert('Fill all the input fildes ' + isEmpty.toString().split(','))
      }
    }
  </script>

</body>

</html>