<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0cf882, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px;
            width: 350px;
            color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #00c6ff;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
        }

        a {
            color: #ffd369;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeIn 0.8s ease-in-out;
        }

        /* Input focus effect */
        input:focus {
            outline: none;
            box-shadow: 0 0 10px #00c6ff;
            transform: scale(1.03);
            transition: 0.3s;
        }

        /* Button hover */
        button {
            transition: all 0.3s ease;
        }

        button:hover {
            transform: translateY(-3px);
            background: #00c6ff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

     
    </style>
</head>

<body>

    <div class="card">
        <h2 style="text-align:center;">Create Account</h2>

        <?php
        if ($_POST) {
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $result = $conn->query("SELECT * FROM auth_users WHERE email='$email'");

            if ($result->num_rows > 0) {
                echo "<p style='color:red;'>Email already registered</p>";
            } else {
                $conn->query("INSERT INTO auth_users (email, password) VALUES ('$email', '$password')");
                echo "<p style='color:lightgreen;'>Registered! <a href='login.php'>Login</a></p>";
            }
        }
        ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button>Register</button>
        </form>

        <p style="text-align:center;">Already have account? <a href="login.php">Login</a></p>
    </div>

</body>

</html>