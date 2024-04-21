<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Return Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .message {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book Return Reminder</h2>
        <div class="message">
            <p>Dear {{$reservation->client->user->name}},</p>
            <p>This is a friendly reminder that you have borrowed the book "{{$reservation->book->totle}}" from our library, and it is due for return tomorrow. Please make sure to return the book on time to avoid any late fees.</p>
            <p>Thank you for your cooperation.</p>
        </div>
        <p>Sincerely,</p>
        <p><strong>Bookify</strong><br>Admin<br><a href="mailto:bookify@gmail.com">bookify@gmail.com</a></p>
    </div>
</body>
</html>
