
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <p>Hello,</p>
    <p>We received a request to reset your password. Click the link below to reset it:</p>
    <a href="{{route('ResetPassword',$token)}}" class="button">Reset</a>
    <p>If you didn't request a password reset, you can ignore this email.</p>
    <p>Thank you!</p>







    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        p {
            margin-bottom: 16px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;

        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: gray;
        }
    </style>
</body>
</html>

