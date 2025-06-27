<?php
$conn = mysqli_connect("localhost", "test", "password123", "project");
if (!$conn) die("Connection failed: " . mysqli_connect_error());
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM books WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $message = "Book deleted successfully.";
    } else 
        $message = "Error deleting book: " . mysqli_error($conn);
}
$result = mysqli_query($conn, "SELECT id, title FROM books");
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head><title>Delete Book</title></head>
<body>
    <h2>Delete Book</h2>
    <?php if (isset($message)) echo "<p><em>$message</em></p>"; ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td>
                        <a href="?id=<?= $row['id'] ?>" onclick="return confirm('Delete this book?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="3">No books found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
