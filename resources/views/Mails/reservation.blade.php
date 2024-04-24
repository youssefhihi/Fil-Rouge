<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation of Your Book Reservation</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #333;">Confirmation of Your Book Reservation</h2>
       
                <p>Dear {{ $reservation->client->user->name }},</p>



        <p>We are delighted to confirm your reservation of the book "<strong>{{$reservation->book->title}}</strong>" at <strong>Bookify</strong>. Thank you for choosing us for your reading needs!</p>

        <p>Below are the details of your reservation:</p>
        <ul>
            <li><strong>Book Title:</strong> {{$reservation->book->title}}</li>
            <li><strong>Author:</strong> {{$reservation->book->author->name}}</li>
            <li><strong>Start Date of Reservation:</strong> {{$reservation->startDate}}</li>
            <li><strong>Expected Return Date:</strong> {{$reservation->returnDate}}</li>
        </ul>

        <p>Please note the following:</p>
        <ol>
            <li><strong>Pickup Instructions:</strong> Your reserved book will be available for pickup starting from {{$reservation->startDate}}. Please visit our library during our operating hours to collect your book.</li>
            <li><strong>Return Instructions:</strong> Kindly ensure that you return the book by {{$reservation->returnDate}} to avoid any late fees or penalties.</li>
            <li><strong>Contact Information:</strong> If you have any questions or need assistance regarding your reservation, feel free to contact us at bookify@gmail.com.</li>
        </ol>

        <p>We hope you enjoy reading your reserved book! If you have any feedback or suggestions, we'd love to hear from you.</p>

        <p>Thank you for choosing <strong>Bookify</strong>. We appreciate your patronage.</p>

        <p>Warm regards,</p>
        <p><strong>Bookify</strong><br><a href="mailto:bookify@gmail.com">bookify@gmail.com</a></p>
    </div>
</body>
</html>


