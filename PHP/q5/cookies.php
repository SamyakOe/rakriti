<?php
if (isset($_POST['set_cookie'])) {
    setcookie('username', $_POST['username'], time() + 3600, "/");
    $message = "Cookie 'username' set with value: " . htmlspecialchars($_POST['username']);
}
$storedUser = $_COOKIE['username'] ?? "No cookie data stored.";
if (isset($_POST['destroy_cookie'])) {
    setcookie('username', '', time() - 3600, "/");
    $storedUser = "Cookie destroyed. No data stored.";
    $message = "Cookie destroyed successfully.";
}
?>
<!DOCTYPE html>
<html>
<head><title>Cookie Example</title></head>
<body>
    <h2>Cookie Store, Retrieve, and Destroy Example</h2>
    <p><strong>Current Cookie User:</strong> <?= htmlspecialchars($storedUser) ?></p>
    <?= isset($message) ? "<p><em>$message</em></p>" : "" ?>
    <form method="post">
        <input type="text" name="username" placeholder="Enter username to store in cookie" required>
        <button type="submit" name="set_cookie">Store in Cookie</button>
    </form>
    <form method="post" style="margin-top:10px;">
        <button type="submit" name="destroy_cookie">Destroy Cookie</button>
    </form>
</body>
</html>