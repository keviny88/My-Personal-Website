<?php

	// $name = $_POST['name'];
 //    $email = $_POST['email'];
 //    $subject = $_POST['subject'];
 //    $message = $_POST['message'];


 //    echo $name; 
 //    echo $email;
 //    echo $subject;
 //    echo $message;


    $name = $_POST["name"];
    $email = $_POST["email"];
    $body = $_POST["message"];
    $response = $_POST["captcha"];
    $subject = $_POST["subject"];
    $from = 'From: '.$name;
    $to = 'me@kevinyin.com';

    $secret = "6LcIIy0UAAAAAFtuOnb5Za3qKQ0xrmD3XXsjjJIT";

    $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    $captcha_success=json_decode($verify);
    if ($captcha_success->success==false) {
        echo "CAPTCHA_FAIL";
    } else if ($captcha_success->success==true) {
        $body = "From: $name\n E-Mail: $email\n Message:\n $message";
        if (mail ($to, $subject, $body, $from)) { 
            echo "MAIL_SENT";
        } else { 
            echo "MAIL_NOT SENT"; 
        }   
    }

?>