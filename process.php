<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['a'], $_POST['b'], $_POST['c'], $_POST['d'], $_POST['e'])) {
    $numbers = [$_POST['a'], $_POST['b'], $_POST['c'], $_POST['d'], $_POST['e']];
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['a'], $_GET['b'], $_GET['c'], $_GET['d'], $_GET['e'])) {
    $numbers = [$_GET['a'], $_GET['b'], $_GET['c'], $_GET['d'], $_GET['e']];
} else {
    die("<p>Error: No valid input received.</p>");
}

// Convert data to JSON for Python script
$json_input = json_encode($numbers);

$command = "python3 data_management.py";
$descriptor_spec = [
    0 => ["pipe", "r"], // Standard input (stdin)
    1 => ["pipe", "w"], // Standard output (stdout)
    2 => ["pipe", "w"]  // Standard error (stderr)
];
$process = proc_open($command, $descriptor_spec, $pipes);

if (is_resource($process)) {
    fwrite($pipes[0], $json_input);
    fclose($pipes[0]);

    $output = stream_get_contents($pipes[1]);
    fclose($pipes[1]);

    $error_output = stream_get_contents($pipes[2]);
    fclose($pipes[2]);

    proc_close($process);

    if (!empty($error_output)) {
        echo "<p>Error executing Python script:</p><pre>$error_output</pre>";
    } else {
        echo $output;
    }
} else {
    echo "<p>Error: Could not execute the Python script.</p>";
}
?>
