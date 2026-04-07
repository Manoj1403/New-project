<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">
        <h2 class="text-center mb-4">🚀 CI/CD User Management</h2>

        <p class="text-center text-success">
            Connect to EC2 with CI/CD Pipeline ✅
        </p>

        <!-- Form -->
        <form action="add.php" method="POST" class="row g-3">
            <div class="col-md-5">
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>

            <div class="col-md-5">
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Add</button>
            </div>
        </form>

        <hr>

        <!-- Table -->
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="120">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM users");

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>
                            <a href='delete.php?id=".$row['id']."' class='btn btn-danger btn-sm'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

</div>

</body>
</html>