<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #22d6ff, #ff7eb3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            backdrop-filter: blur(15px);
            background: rgba(18, 3, 3, 0.22);
            border-radius: 15px;
            padding: 30px;
            width: 350px;
            color: white;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #222;
            color: white;
            border-radius: 8px;
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
        <h2 style="text-align:center;">Welcome Back</h2>

        <?php
        if ($_POST) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $result = $conn->query("SELECT * FROM auth_users WHERE email='$email'");
            $user = $result->fetch_assoc();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['email'];
                header("Location: index.php");
            } else {
                echo "<p style='color:red;'>Invalid credentials</p>";
            }
        }
        ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button>Login</button>
        </form>
        <p class="text-center mt-3">
            New user? <a href="register.php">Register</a>
        </p>
    </div>

</body>

</html>