<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> send email with php </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="conatainer">
        <h1>contact</h1>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="name" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <input type="tel" name="phone" placeholder="Enter Number">
            </div>

            <div class="form-group">
                <textarea cols="40" rows="5" name="msg" placeholder="Enter your Massage"></textarea>
            </div>

            <input id="btn" type="submit" name="send" value="send">
    </div>
    </form>

</body>

</html>

<!-- make a php section  -->
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $msg    = $_POST['msg'];

    //Load Composer's autoloader
    require 'PHPMailer.php';
    require 'SMTP.php';
    require 'Exception.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'agrawalpradhumn35@gmail.com';                     //SMTP username
        $mail->Password   = 'lrsu ykfm saoe rxgg';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('agrawalpradhumn35@gmail.com',);
        $mail->addAddress('pradhumn.agrawal@bhagirathtechnologies.com', 'selfuser ');     //Add a recipient



        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'information';
        $mail->Body    = "Name -$name <br>Email-$email  <br>   phone- $phone <br> message- $msg";


        $mail->send();
        echo "<div class= 'success'> Massgae Has Been  Sent ✔ </ div>";
    } catch (Exception $e) {
        echo "<div class='alert'>massage could't send ✖ </div>";
    }
}
?>