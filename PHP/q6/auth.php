<?php
session_start();
$validUser = 'admin';
$validPass = 'password123';
if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($username === $validUser && $password === $validPass) {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $message = "Login successful. Welcome, $username!";
    } else 
        $message = "Invalid username or password.";
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    $message = "You have been logged out.";
}
?>
<!DOCTYPE html>
<html>
<head><title>PHP Authentication</title></head>
<body>
    <h2>Simple PHP Authentication System</h2>
    <?php if (isset($message)) echo "<p><em>$message</em></p>"; ?>
    <?php if (!empty($_SESSION['authenticated'])): ?>
        <p><strong>Welcome, <?= htmlspecialchars($_SESSION['username']) ?></strong></p>
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    <?php else: ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button type="submit" name="login">Login</button>
        </form>
    <?php endif; ?>
</body>
</html>
