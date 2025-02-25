{\rtf1\ansi\ansicpg1252\cocoartf2757
\cocoatextscaling0\cocoaplatform0{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\paperw11900\paperh16840\margl1440\margr1440\vieww11520\viewh8400\viewkind0
\pard\tx720\tx1440\tx2160\tx2880\tx3600\tx4320\tx5040\tx5760\tx6480\tx7200\tx7920\tx8640\pardirnatural\partightenfactor0

\f0\fs24 \cf0 <?php\
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin (for security, replace * with your domain)\
header("Access-Control-Allow-Methods: POST, OPTIONS"); // Allow POST and preflight OPTIONS request\
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allow necessary headers\
\
// Handle preflight request\
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") \{\
    http_response_code(200);\
    exit();\
\}\
?>\
\
\
\
<?php\
if ($_SERVER["REQUEST_METHOD"] == "POST") \{\
    $fname = $_POST['fname'];\
    $lname = $_POST['lname'];\
    $email = $_POST['email'];\
    $phone = $_POST['phone'];\
    $services = $_POST['services'];\
    $date = $_POST['date'];\
\
    $to = "youmatter@takecareofyourself.in\'94; // Change to your email\
    $subject = "New Appointment Booking";\
    $headers = "From: " . $email . "\\r\\n";\
    $headers .= "Reply-To: " . $email . "\\r\\n";\
    $headers .= "Content-Type: text/plain; charset=UTF-8\\r\\n";\
\
    $message = "New Appointment Details:\\n\\n";\
    $message .= "First Name: $fname\\n";\
    $message .= "Last Name: $lname\\n";\
    $message .= "Email: $email\\n";\
    $message .= "Phone: $phone\\n";\
    $message .= "Service: $services\\n";\
    $message .= "Preferred Date: $date\\n";\
\
    if (mail($to, $subject, $message, $headers)) \{\
        echo "Appointment request sent successfully!";\
    \} else \{\
        echo "Error sending appointment request.";\
    \}\
\} else \{\
    echo "Invalid request.";\
\}\
?>\
}