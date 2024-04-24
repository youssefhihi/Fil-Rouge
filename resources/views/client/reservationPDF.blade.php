<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #000;
            border-radius: 10px;
        }
        h1, p {
            text-align: center;
        }
        .info {
            margin-top: 20px;
            font-weight: bold;
        }
        .button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Library Reservation</h1>
        <p>Dear Library Staff,</p>
        <p>This is to inform you that the following book has been reserved:</p>
        <div class="info">
            <p>emprunt:{{$reservation->client->user->name}} </p>
            <p>emprunt:{{$reservation->client->user->email}} </p>
            <p>emprunt:{{$reservation->client->phone}} </p>
            <p><strong>Title:</strong> {{$reservation->book->title}}</p>
            <p><strong>Reserved Date:</strong> {{ $reservation->created_at->format('Y-m-d') }}</p>
        </div>
        <p>Please take note of this reservation and ensure that the book is available for pickup on the reserved date.</p>
        <p>Thank you!</p>
    </div>
</body>
</html>
