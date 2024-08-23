<?php
require_once('connection.php');
$id  = $_GET['id'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $subject = $_POST['subject'];
    $gender = $_POST['gender'];
    $file = $_FILES['file'];
    $message = $_POST['message'];

    echo $number;

    // die; 
    // Set target file path
    $uploadDir = 'uploads/' . $file['name'];
    move_uploaded_file($file['tmp_name'], $uploadDir);



    if (!$file['name']) {
        $updateSql = "UPDATE admission_crud SET name='$name', email='$email', password='$password', number='$number', dob='$dob', subject='$subject', gender='$gender',  message='$message'  where id = '$id' ";
    } else {
        $updateSql = "UPDATE admission_crud SET name='$name', email='$email', password='$password', number='$number', dob='$dob', subject='$subject', gender='$gender', file='$uploadDir', message='$message' where id = '$id' ";
    }

    $result = mysqli_query($conn, $updateSql);

    if ($result) {
        header('location: user.php');
    } else {
        echo "There is error to update ";
    }
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

                    <?php
                    if (isset($_GET['id'])) {

                        $sql = "SELECT * from admission_crud where id = $id ";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result)) {
                            while ($value = mysqli_fetch_assoc($result)) {

                    ?>

                                <h1 class="py-3 text-center text-4xl">Registretion Form</h1>
                                <div>
                                    <span class="uppercase text-gray-600 font-medium ">Full Name</span>
                                    <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation " name="name" value='<?php echo $value['name']; ?>' type="text">
                                </div>

                                <div class="mt-8">
                                    <span class="uppercase text-gray-600 font-medium ">Email</span>
                                    <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation" name="email" required type="email" value=<?php echo $value['email'] ?>>
                                </div>

                                <div class="mt-8">
                                    <span class="uppercase text-gray-600 font-medium ">Password</span>
                                    <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation" name="password" value=<?php echo $value['password'] ?> required type="password">
                                </div>

                                <div class="mt-8">
                                    <span class="uppercase text-gray-600 font-medium ">Number</span>
                                    <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation" name="number" required type="number" value=<?php echo $value['number'] ?>>
                                </div>

                                <div class="mt-8">
                                    <span class="uppercase text-gray-600 font-medium ">DOB</span>
                                    <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation" name="dob" required type="date" value=<?php echo $value['dob'] ?>>
                                </div>

                                <div class="mt-8">
                                    <span class="uppercase text-gray-600 font-medium ">Subject</span>
                                    <select name="subject" class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline " id="subject" ?>>
                                        <option <?php if ($value['subject'] == '') {
                                                    echo 'selected';
                                                } ?> name="subject" value="">Select</option>
                                        <option <?php if ($value['subject'] == 'art') {
                                                    echo 'selected';
                                                } ?> name="subject" value="art">Art</option>
                                        <option <?php if ($value['subject'] == 'maths') {
                                                    echo 'selected';
                                                } ?> name="subject" value="maths">Maths</option>
                                        <option <?php if ($value['subject'] == 'science') {
                                                    echo 'selected';
                                                } ?> name="subject" value="science">Science</option>
                                        <option <?php if ($value['subject'] == 'biology') {
                                                    echo 'selected';
                                                } ?> name="subject" value="biology">Biology</option>
                                    </select>
                                </div>

                                <div class="mt-8">
                                    <span class="uppercase text-gray-600 font-medium  w-full block mb-3">Gender</span>
                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-3 ms-4">
                                            <span class="uppercase font-normal ">Male</span>
                                            <input class=" mx-2" name='gender' value="male" required type="radio" <?php if ($value['gender'] == 'male') {
                                                                                                                        echo 'checked';
                                                                                                                    }  ?>>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="uppercase font-normal">Female</span>
                                            <input class=" mx-2" name='gender' value='female' required type="radio" <?php if ($value['gender'] == 'female') {
                                                                                                                        echo 'checked';
                                                                                                                    }  ?>>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <span class="uppercase text-gray-600 font-medium ">File</span>
                                    <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline input-validation " name='file' type="file" accept="<?php echo $value['file']; ?>">
                                </div>

                                <div class="mt-8">
                                    <span class="uppercase text-gray-600 font-medium ">Message</span>
                                    <textarea class="w-full h-32 bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" name="message"> <?php echo $value['message']; ?> </textarea>
                                </div>
                                <div class="mt-8">
                                    <button class="uppercase font-medium  tracking-wide bg-indigo-500 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline " name='submit' id="submit" role='submit'>
                                        Send Message
                                    </button>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
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