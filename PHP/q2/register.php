<?php
if (!($conn= mysqli_connect("localhost", "test", "password123", "project"))) {
    die("Connection failed: " . mysqli_connect_error());
}
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $faculty = mysqli_real_escape_string($conn, $_POST["faculty"]);
    if ($name && $email && $password && $phone && $gender && $faculty) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO registrations (name, email, password, phone, gender, faculty)
                VALUES ('$name', '$email', '$hashed_password', '$phone', '$gender', '$faculty')";
        if (mysqli_query($conn, $sql)) $msg = "Registration successful!";
        else $msg = "Error: " . mysqli_error($conn);
    } else $msg = "Please fill in all fields.";
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body >
    <h2>Student Registration Form</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Full Name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Email Address" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" placeholder="Phone Number" required><br><br>
        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select><br><br>
        <label for="faculty">Faculty:</label>
        <input type="text" name="faculty" placeholder="Faculty" required><br><br>
        <input type="submit" value="Register">
    </form>
    <p style="color:green"><?= $msg ?></p>
</body>
</html>