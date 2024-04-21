<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserved Book Pickup Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        p {
            margin: 10px 0;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Dear {{$reservation->client->user->name}},</p>
        <p>We are pleased to inform you that the book you reserved on {{$reservation->created_at}}, "<strong>{{$reservation->book->title}}</strong>", is now available for pickup at the library.</p>
        <p>Please visit the library at your earliest convenience to collect your reserved book.</p>
        <p>Thank you for using our reservation service. If you have any questions or need assistance, feel free to contact us.</p>
        <p>Sincerely,</p>
        <p>Bookify</p>
        <a href="#" class="button">Print Reservation</a>
    </div>
</body>
</html>
