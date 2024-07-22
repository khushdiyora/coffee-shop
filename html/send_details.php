<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'vendor/autoload.php';

// Check if reservation ID is provided
if (isset($_GET['id'])) {
    // Include necessary files and establish database connection
    include_once("header.php"); // Assuming header.php includes necessary configurations

    // Fetch reservation details based on ID
    $id = $_GET['id'];
    $query = "SELECT * FROM reservation WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Extract reservation details
        $name = $row['name'];
        $email = $row['email'];
        $seats = $row['seats'];
        $date = $row['r_date'];

        try {
            // Instantiate PHPMailer
            $mail = new PHPMailer(true);

            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Update with your SMTP server hostname
            $mail->SMTPAuth = true;
            $mail->Username = 'noreplyarabicacafe@gmail.com'; // SMTP username
            $mail->Password = ''; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('noreplyarabicacafe@gmail.com', 'Arabica Cafe'); // Sender's email address and name
            $mail->addAddress($email, $name); // Recipient's email address and name

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Reservation Details Of Table on '. $date .'';

            // Email body
            $mail->Body = '<p><strong><h2>Thank you for your reservation!  Here are your reservation details: </h2></strong></p>
               <div style="font-family: Arial, sans-serif; background-color:#a2795c;padding:20px;text-align:center;color: #ffffff;border-radius:10px 10px 0 0;">
                    
                    <h1 style="font-family: "Times New Roman", Times, serif;">Arabica Café</h1>
                    
                </div>
                <div style="padding:20px; font-family: Arial, sans-serif;">
                    <p>Dear ' . $name . ',</p>
                    <p>Thank you for your reservation. Here are your reservation details:</p>
                    <table style="width:100%;border-collapse:collapse;">
                        <tr>
                            <td style="padding:10px;border:1px solid #ddd;"><strong>Name:</strong></td>
                            <td style="padding:10px;border:1px solid #ddd;">' . $name . '</td>
                        </tr>
                        <tr>
                            <td style="padding:10px;border:1px solid #ddd;"><strong>Email:</strong></td>
                            <td style="padding:10px;border:1px solid #ddd;">' . $email . '</td>
                        </tr>
                        <tr>
                            <td style="padding:10px;border:1px solid #ddd;"><strong>Seats:</strong></td>
                            <td style="padding:10px;border:1px solid #ddd;">' . $seats . '</td>
                        </tr>
                        <tr>
                            <td style="padding:10px;border:1px solid #ddd;"><strong>Date:</strong></td>
                            <td style="padding:10px;border:1px solid #ddd;">' . $date . ' &nbsp; [YYYY-MM-DD]</td>
                        </tr>
                    </table>
                    <p>This is a computer-generated email, please do not reply to this email.</p>
                    <p>If you have any questions, kindly contact our support team support@arabicacoffee.com</p>
                    <p>If this was not done by you, report this booking at support@arabicacoffee.com</p>
                    <p>Thank you,<br>Arabica Café Team</p>
                </div>
                <div style="background-color:#a2795c    ;padding:10px;text-align:center;color:white;border-radius:0 0 10px 10px;">
                    © 2024 Arabica Café. All rights reserved.
                </div> 
                <p><strong><h2>We look forward to welcoming you on <p style="color:red"> '. $date . ' [YYYY-MM-DD]  </p> Please feel free to contact us if you have any questions or need further assistance.</h2></strong></p>';

            $mail->send();
            echo "<script>alert('Reservation details sent successfully to $email.');
                  window.location.href = 'reservation_list.php';
                  </script>";
        } catch (Exception $e) {
            echo "<script>alert('Failed to send reservation details. Error: {$mail->ErrorInfo}');
                  window.location.href = 'reservation_list.php';
                  </script>";
        }
    } else {
        echo "<script>alert('Reservation not found.');
              window.location.href = 'reservation_list.php';
              </script>";
    }
} else {
    echo "<script>alert('Reservation ID not specified.');
          window.location.href = 'reservation_list.php';
          </script>";
}
?>
