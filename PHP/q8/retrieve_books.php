<?php
if (!($conn= mysqli_connect("localhost", "test", "password123", "project"))) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Books</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Book Records</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Publisher</th>
            <th>Author</th>
            <th>Edition</th>
            <th>Pages</th>
            <th>Price</th>
            <th>Publish Date</th>
            <th>ISBN</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['publisher']}</td>
                        <td>{$row['author']}</td>
                        <td>{$row['edition']}</td>
                        <td>{$row['no_of_page']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['publish_date']}</td>
                        <td>{$row['isbn']}</td>
                      </tr>";
            }
        } else 
            echo "<tr><td colspan='9'>No books found.</td></tr>";
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
