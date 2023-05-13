<?php

require 'functions.php';

$from = $_POST['from'];
$fromName = $_POST['fromName'];
$to = $_POST['to'];
$toName = $_POST['toName'];
$subject = $_POST['subject'];
$body = $_POST['message'];
$altBody = strip_tags($_POST['message']);

$result = send_mail($from, $fromName, $to, $toName, $subject, $body, $altBody);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        a {
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1><?php echo $result; ?></h1>
    <a href="javascript:history.back()">Go Back</a>
</div>
</body>
</html>