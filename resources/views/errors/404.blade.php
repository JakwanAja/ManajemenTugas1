{{-- resources/views/errors/404.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .content {
            max-width: 600px;
        }

        .code {
            font-size: 100px;
            color: #ff4c4c; /* Warna merah */
            font-weight: 700;
        }

        .message {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 400;
        }

        .error-message {
            font-size: 20px;
            background-color: #ff4c4c;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .error-message:hover {
            background-color: #e60000;
        }

        .back-button {
            margin-top: 30px;
            padding: 10px 25px;
            background-color: #636b6f;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #4e555b;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="code">404</div>
        <div class="message">Page Not Found</div>
        <div class="error-message">Error bro, mending balik ke halaman sebelumnya.</div>
        <a href="javascript:history.back()" class="back-button">Go Back</a>
    </div>
</body>
</html>
