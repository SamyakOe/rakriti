<?php
$conn = mysqli_connect("localhost", "test", "password123", "project") or die("Connection failed");
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
    $password = trim($_POST["password"]);
    if ($email && $password) {
        $sql = "SELECT * FROM registrations WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user["password"])) {
                $msg = "Login successful. Welcome, " . htmlspecialchars($user["name"]) . "!";
            } else 
                $msg = "Incorrect password.";
        } else 
            $msg = "User not found.";
    } else 
        $msg = "Please enter both email and password.";
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login Form</h2>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <p style="color:green"><?= $msg ?></p>
</body>
</html>
