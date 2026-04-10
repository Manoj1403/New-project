<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
include 'db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins';
            background: #291414;
            color: white;
        }

        .container {
            width: 80%;
            margin: auto;
            margin-top: 40px;
        }

        .card {
            background: linear-gradient(135deg, #738904, #a464e4);
            padding: 20px;
            border-radius: 10px;
        }

        input {
            padding: 10px;
            margin: 5px;
            border-radius: 6px;
            border: none;
        }

        button {
            padding: 10px;
            background: #38bdf8;
            border: none;
            border-radius: 6px;
            color: black;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #444;
            text-align: left;
        }

        /* Card animation */
        .card {
            animation: fadeIn 1s ease-in-out;
        }

        /* Table row hover */
        tr:hover {
            background: #1e293b;
            transition: 0.3s;
        }

        /* Button hover */
        button:hover {
            transform: scale(1.05);
            background: #0ea5e9;
            transition: 0.3s;
        }

        /* Smooth input animation */
        input {
            transition: all 0.3s ease;
        }

        input:focus {
            transform: scale(1.05);
            box-shadow: 0 0 8px #38bdf8;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <h2>Dashboard 🚀</h2>
            <p>Welcome: <?php echo $_SESSION['user']; ?> | <a href="logout.php">Logout</a></p>

            <form action="add.php" method="POST">
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <button>Add</button>
            </form>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

                <?php
                $result = $conn->query("SELECT * FROM users");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td><a href='delete.php?id={$row['id']}'>Delete</a></td>
                      </tr>";
                }
                ?>
            </table>
        </div>
    </div>

</body>

</html>