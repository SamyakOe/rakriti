<!DOCTYPE html>
<html>

<head>
    <title>Interest Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 60px;
            padding: 10px 100px
        }

        input,
        button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <h2>Interest Calculator</h2>
    <form method="post">
        <label>Principal:</label><br>
        <input type="number" step="0.01" name="principal" required><br>
        <label>Rate (%):</label><br>
        <input type="number" step="0.01" name="rate" required><br>
        <label>Time (years):</label><br>
        <input type="number" step="0.01" name="time" required><br>
        <button type="submit" name="submit">Calculate Interest</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $p = floatval($_POST["principal"]);
        $r = floatval($_POST["rate"]);
        $t = floatval($_POST["time"]);
        if (isset($_POST['submit'])) {
            $si = ($p * $r * $t) / 100;
            echo "<h3>Simple Interest: Rs. " . number_format($si, 2) . "</h3>";
            $ci = $p * pow((1 + $r / 100), $t) - $p;
            echo "<h3>Compound Interest: Rs. " . number_format($ci, 2) . "</h3>";
        }
    }
    ?>
</body>

</html>