<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 50px;
        }

        .login-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .login-form {
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
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

        .signup-section {
            margin-top: 20px;
        }

        .signup-section p {
            color: #333;
        }

        .signup-section a {
            color: #4e4ffa;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form class="login-form" action="customerLoginServlet.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required maxlength="25">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
        <div class="signup-section">
            <p>Not registered yet? <a href="signup.php">Signup here</a>.</p>
        </div>
    </div>
</body>

</html>
