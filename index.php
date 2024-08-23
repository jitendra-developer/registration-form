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

  $data = [$name, $email, $password, $number, $dob, $subject, $gender, $message];

  // print_r($data);

  /* Send image */
  $fileName = $file['name'];
  $fileTmp = $file['tmp_name'];
  $fileErr = $file['error'];

  // Set target directory
  $filePath = 'uploads/' . $fileName;
  // if (!is_dir($uploadDir)) {
  //   mkdir($uploadDir, 0777, true);
  // }

  // Set target file path
  // $filePath = $uploadDir . $fileName;
  move_uploaded_file($fileTmp, $filePath);


  $sql = "INSERT INTO `admission_crud` (`name`, `email`, `password`, `number`, `dob`, `subject`, `gender`, `message`, `file` )  VALUES ('$name','$email','$password','$number','$dob','$subject', '$gender', '$message','$filePath' ) ";

  $result = mysqli_query($conn, $sql);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registretion Form</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


    * {
      font-family: 'poppins';
    }
  </style>
</head>

<body class="antialiased bg-gray-200">

  <?php include('navbar.php'); ?>

  <div class="w-full flex-1 flex-col mt-36 mb-16 ">
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
            <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation" min="10" max="10" name="number" required type="number">
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