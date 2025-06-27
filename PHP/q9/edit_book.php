<?php
$conn = mysqli_connect("localhost", "test", "password123", "project");
if (!$conn) die("Connection failed: " . mysqli_connect_error());
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $publisher = $_POST['publisher'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $pages = $_POST['no_of_page'];
    $price = $_POST['price'];
    $date = $_POST['publish_date'];
    $isbn = $_POST['isbn'];
    $sql = "UPDATE books SET 
            title='$title', publisher='$publisher', author='$author', edition='$edition',
            no_of_page=$pages, price=$price, publish_date='$date', isbn='$isbn'
            WHERE id=$id";
    $message = mysqli_query($conn, $sql) ? "Book updated successfully." : "Error: " . mysqli_error($conn);
}
$select_id = $_GET['select_id'] ?? null;
$book = null;
if ($select_id) {
    $result = mysqli_query($conn, "SELECT * FROM books WHERE id=$select_id");
    $book = mysqli_fetch_assoc($result);
}
$books = mysqli_query($conn, "SELECT id, title FROM books");
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Book</title></head>
<body>
<h2>Select a Book to Edit</h2>
<form method="get">
    <select name="select_id" required>
        <option value="">-- Choose a book --</option>
        <?php while ($row = mysqli_fetch_assoc($books)) : ?>
            <option value="<?= $row['id'] ?>" <?= $select_id == $row['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($row['title']) ?> (ID: <?= $row['id'] ?>)
            </option>
        <?php endwhile; ?>
    </select>
    <button type="submit">Edit</button>
</form>
<?php if (isset($message)) echo "<p><em>$message</em></p>"; ?>
<?php if ($book): ?>
    <h3>Edit Book Information</h3>
    <form method="post">
        <input type="hidden" name="id" value="<?= $book['id'] ?>">
        <input name="title" value="<?= $book['title'] ?>" required><br><br>
        <input name="publisher" value="<?= $book['publisher'] ?>" required><br><br>
        <input name="author" value="<?= $book['author'] ?>" required><br><br>
        <input name="edition" value="<?= $book['edition'] ?>" required><br><br>
        <input type="number" name="no_of_page" value="<?= $book['no_of_page'] ?>" required><br><br>
        <input type="number" step="0.01" name="price" value="<?= $book['price'] ?>" required><br><br>
        <input type="date" name="publish_date" value="<?= $book['publish_date'] ?>" required><br><br>
        <input name="isbn" value="<?= $book['isbn'] ?>" required><br><br>
        <button type="submit" name="update">Update Book</button>
    </form>
<?php elseif ($select_id): ?>
    <p>Book not found.</p>
<?php endif; ?>
</body>
</html>
