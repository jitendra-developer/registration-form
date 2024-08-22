<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $subject = $_POST['subject'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];

    echo $name;
    echo '<br>';
    echo $email;
    echo '<br>';
    echo $password;
    echo '<br>';
    echo $number;
    echo '<br>';
    echo $gender;
    echo '<br>';
    echo $subject;
    echo '<br>';
    echo $message;
    echo '<br>';
    echo $dob;
    echo '<br>';
    echo ' jsdf asdf asdf asd fasdfja sdl';

}
