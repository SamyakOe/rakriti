<?php
session_start();
if (!empty($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
    $message = "Session data stored for user: " . htmlspecialchars($_SESSION['username']);
} elseif (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    $message = "Session destroyed successfully.";
}
$storedUser = $_SESSION['username'] ?? "No session data stored.";
if (isset($_POST['logout'])) 
    $storedUser = "Session destroyed. No data stored.";
?>
<!DOCTYPE html>
<html>
<head><title>Session Example</title></head>
<body>
    <h2>Session Store, Retrieve, and Destroy Example</h2>
    <p><strong>Current Session User:</strong> <?= htmlspecialchars($storedUser) ?></p>
    <?= isset($message) ? "<p><em>$message</em></p>" : "" ?>
    <form method="post">
        <input type="text" name="username" placeholder="Enter username to store" required>
        <button type="submit">Store in Session</button>
    </form>
    <form method="post" style="margin-top:10px;">
        <button type="submit" name="logout">Destroy Session</button>
    </form>
</body>
</html>