<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['a'], $_GET['b'], $_GET['c'], $_GET['d'], $_GET['e'])) {
    // Retrieve values from URL parameters if they are set
    $a = htmlspecialchars($_GET['a']);
    $b = htmlspecialchars($_GET['b']);
    $c = htmlspecialchars($_GET['c']);
    $d = htmlspecialchars($_GET['d']);
    $e = htmlspecialchars($_GET['e']);
} else {
    $a = $b = $c = $d = $e = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Input Form</title>
</head>
<body>
    <form action="process.php" method="post">
        <label for="a">Enter number A:</label>
        <input type="number" name="a" id="a" value="<?php echo $a; ?>" required><br>

        <label for="b">Enter number B:</label>
        <input type="number" name="b" id="b" value="<?php echo $b; ?>" required><br>

        <label for="c">Enter number C:</label>
        <input type="number" name="c" id="c" value="<?php echo $c; ?>" required><br>

        <label for="d">Enter number D:</label>
        <input type="number" name="d" id="d" value="<?php echo $d; ?>" required><br>

        <label for="e">Enter number E:</label>
        <input type="number" name="e" id="e" value="<?php echo $e; ?>" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
