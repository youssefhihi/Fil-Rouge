<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Book Added!</title>
    <style>
        /* Define your email styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            display: flex;
            justify-self: center;
        }

        p {
            color: #666666;
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
</head>
<body>
    <div class="container">
        <h1>New Book Added!</h1>
        <p>We are excited to inform you that a new book has been added to our collection:</p>
        
        <h2 > {{$book->title}}</h2>
        <div style="display:flex;">
            <p>Genre: {{$book->genre->name}}</p>
            <p>Author: {{$book->author->name}}</p>
        </div>
        <p>Description:{{$book->description}}</p>
        <p>Language: {{$book->language}}</p>
        <p>Published Date: {{$book->publicationDate}}</p>
        <p>Quantity: {{$book->quantity}}</p>
        <p>Get your copy now and enjoy reading!</p>

        <a href="{{route('book.details',$book)}}" class="button">Learn More</a>
    </div>
</body>
</html>
