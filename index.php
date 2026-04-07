<?php include 'db.php'; ?>

<h2>User List</h2>

<form action="add.php" method="POST">
    Name: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    <button type="submit">Add User</button>
</form>

<hr>

<?php
$result = $conn->query("SELECT * FROM users");

while($row = $result->fetch_assoc()) {
    echo $row['name'] . " - " . $row['email'];
    echo " <a href='delete.php?id=".$row['id']."'>Delete</a><br>";
}
?>