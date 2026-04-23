<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$conn = new mysqli("localhost", "root", "", "mh2_it_center");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$date = $_POST['date'];
$payment = $_POST['pay'];

$booking_id = "MH2-" . rand(10000,99999);

// SAVE TO DB
$sql = "INSERT INTO bookings (booking_id,name,email,phone,service,booking_date,payment_method)
VALUES ('$booking_id','$name','$email','$phone','$service','$date','$payment')";

$conn->query($sql);

// ===========================
// SMTP MAIL SETUP
// ===========================
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;


    $mail->Username = 'xxxxxxxxx@gmail.com';

 
    $mail->Password = '';

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // ================= USER EMAIL =================
    $mail->setFrom('xxxxxxx@gmail.com', '');
    $mail->addAddress($email);

    $mail->Subject = "Booking Confirmed - $booking_id";
    $mail->Body = "Hello $name,\n\nYour booking is confirmed.\nBooking ID: $booking_id\nService: $service\nDate: $date";

    $mail->send();


    $mail->clearAddresses();
    $mail->addAddress("mhhridoy7907@gmail.com");

    $mail->Subject = "New Booking Received - $booking_id";
    $mail->Body = "New Booking:\nName: $name\nPhone: $phone\nService: $service\nPayment: $payment\nID: $booking_id";

    $mail->send();

    echo "Booking Successful! ID: $booking_id";

} catch (Exception $e) {
    echo "Mail Error: {$mail->ErrorInfo}";
}
?>
