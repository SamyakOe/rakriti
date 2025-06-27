<?php
if (!($conn= mysqli_connect("localhost", "test", "password123", "project"))) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $publisher = $_POST['publisher'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $no_of_page = $_POST['no_of_page'];
    $price = $_POST['price'];
    $publish_date = $_POST['publish_date'];
    $isbn = $_POST['isbn'];
    $sql = "INSERT INTO books (title, publisher, author, edition, no_of_page, price, publish_date, isbn)
            VALUES ('$title', '$publisher', '$author', '$edition', $no_of_page, $price, '$publish_date', '$isbn')";
    if (mysqli_query($conn, $sql)) {
        $message = "Book data saved successfully.";
    } else 
        $message = "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head><title>Add Book</title></head>
<body>
    <h2>Add Book</h2>
    <?php if (isset($message)) echo "<p><em>$message</em></p>"; ?>
    <form method="post">
        <input name="title" placeholder="Title" required><br><br>
        <input name="publisher" placeholder="Publisher" required><br><br>
        <input name="author" placeholder="Author" required><br><br>
        <input name="edition" placeholder="Edition" required><br><br>
        <input name="no_of_page" type="number" placeholder="Pages" required><br><br>
        <input name="price" type="number" step="0.01" placeholder="Price" required><br><br>
        <input name="publish_date" type="date" required><br><br>
        <input name="isbn" placeholder="ISBN" required><br><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
