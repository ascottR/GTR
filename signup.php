<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 50px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4e4ffa;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3245a8;
        }

        .login-link {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .login-link a {
            color: #4e4ffa;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Signup Form</h2>
    <form method="post" action="signupControl.php">
        First Name: <input type="text" name="firstName" required><br>
        Last Name: <input type="text" name="lastName" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        Phone Number: <input type="text" name="phoneNumber" required><br>
        <input type="submit" value="Signup">
    </form>
    <p class="login-link">Already have an account? <a href="loginbase.php">Login here</a>.</p>
</body>

</html>
