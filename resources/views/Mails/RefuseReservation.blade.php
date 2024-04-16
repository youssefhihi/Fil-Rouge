<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refusal of Book Reservation</title>
</head>
<body>
    <h2>Refusal of Book Reservation</h2>
    <p>Dear {{$reservation->client->user->name}},</p>
    <p>We regret to inform you that your reservation for the book <strong>{{$reservation->book->title}}</strong> has been refused.</p>
    <p><strong>Reason for refusal:</strong> {{$reson}}</p>
    <p>We apologize for any inconvenience this may have caused. If you have any questions or concerns, please feel free to contact us.</p>
    <p>Thank you for your understanding.</p>
    <p>Sincerely,</p>
    <p>Admin</p>
    <p>libraryName</p>
</body>
</html>
