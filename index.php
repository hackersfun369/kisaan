<?php
session_start();
$error_flag = isset($_SESSION['login_error_message']);
$error_message = $_SESSION['login_error_message'] ?? '';
unset($_SESSION['login_error_message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Moderustic:wght@300..800&display=swap" rel="stylesheet">
</head>
<body>
    <style>
        body {
            display: flex;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: rgb(240, 236, 236);
            font-family: 'Moderustic', sans-serif;
        }
        .form {
            display: flex;
            width: 80%;
            padding: 40px;
            border: 2px solid lightgray;
            border-radius: 20px;
            background-color: white;
        }
        .form img {
            width: 550px;
            height: 500px;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .form1 form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            background-color: white;
        }
        .form1 {
            background-color: red;
            width: 45%;
        }
        label {
            font-size: 18px;
            margin-left: -60%;
        }
        input {
            width: 80%;
            height: 35px;
            font-size: 16px;
            border: 2px solid white;
            border-bottom: 2px solid lightgray;
            border-radius: 10px;
            outline: none;
            margin: 20px;
        }
        h1 {
            margin-left: -50px;
            color: green;
            font-size: 35px;
        }
        span {
            color: white;
        }
        .error-message {
            color: red;
            font-size: 16px;
            text-align: center;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 85%;
            background-color: green;
            color: white;
            padding: 10px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            border: none;
        }
        input[type="submit"]:hover {
            background-color: darkgreen;
        }
    </style>
    <div class="form">
        <div class="image" id="image">
            <img src="https://media.istockphoto.com/id/615269462/photo/tractor-mowing-green-field.jpg?s=612x612&w=0&k=20&c=NWmgExT2rJAxxy1XcUrukRLhbL4bntv4kLKJ5hSIRFE=" alt="">
        </div>
        <div class="form1" id="form1">
            <form action="home.php" method="POST">
                <label><h1><span>Kissan</span>-Govt Schemes</h1></label>

                <!-- Display error message if login fails -->
                <?php if ($error_message): ?>
                    <div class="error-message">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>

                <label>Username:</label>
                <input type="email" name="email" placeholder="Enter the Email Address" required>

                <label>Password:</label>
                <input type="password" name="password" placeholder="Enter the Password" required>

                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    <script src="./script.js"></script>
</body>
</html>
