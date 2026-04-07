<?php include 'db.php'; ?>
Connect to the  EC2 with ci cd pipeline
<h2>User List</h2>

<form action="add.php" method="POST">
    <b>Name:</b> <input type="text" name="name" required>
    <b>Email:</b> <input type="email" name="email" required>
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