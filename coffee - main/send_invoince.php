<?php
require '../html/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('tcpdf/tcpdf.php');

// Suppress warnings for unlink function
@ini_set('display_errors', 0); // Optionally hide all other errors
@error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['billContent'])) {
    $email = $_POST['email'];
    $billContent = urldecode($_POST['billContent']);

    // Generate PDF using TCPDF
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->writeHTML($billContent, true, false, true, false, '');

    // Get the PDF as a string
    $pdfOutput = $pdf->Output('invoice.pdf', 'S');

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Update with your SMTP server hostname
        $mail->SMTPAuth = true;
        $mail->Username = 'noreplyarabicacafe@gmail.com'; // SMTP username
        $mail->Password = ''; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Sender and recipient
        $mail->setFrom('noreplyarabicacafe@gmail.com', 'Arabica Cafe');
        $mail->addAddress($email);     // Add a recipient

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Arabica Cafe - Order Receipt';

        // HTML body using Bootstrap classes for styling
        $body = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Arabica Cafe - Order Receipt</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f0f0f0;
                        margin: 0;
                        padding: 0;
                    }
                    .email-body {
                        background-color: #ffffff;
                        border-radius: 8px;
                        padding: 20px;
                        margin: 20px;
                    }
                    .email-footer {
                        text-align: center;
                        color: #777777;
                        font-size: 12px;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="email-body">
                        <h2 class="text-center mb-4">Arabica Cafe - Order Receipt</h2>
                        <p class="text-center">Please find your order receipt attached.</p>

                        <br>
                        <p>This is a computer-generated email, please do not reply to this email.</p>
                    <p>If you have any questions, kindly contact our support team support@arabicacoffee.com</p>
                   
                    <p>Thank you,<br>Arabica Café Team</p>
                    </div>
                </div>
                <div class="container email-footer">
                    <p>&copy; 2024 Arabica Cafe. All rights reserved.</p>
                </div>
            </body>
            </html>
        ';

        $mail->Body = $body;

        // Attach the generated PDF
        $mail->addStringAttachment($pdfOutput, 'Invoice.pdf');

        // Send email
        $mail->send();
        
        echo '<center><h1>Invoice sent successfully to ' . $email . '</h1></center>';

       echo  '<br><br><center><a class="button-profile" href="../index.html"><button>Ok</button></a></div>';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
} else {
    echo 'Invalid request';
}
?>
