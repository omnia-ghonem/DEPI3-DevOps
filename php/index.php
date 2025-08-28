<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Container</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        h1 { color: #2E86C1; }
        p { font-size: 1.2em; }
    </style>
</head>
<body>
    <h1>Hello from PHP Container!</h1>
    <p>This page is served via PHP-FPM.</p>

    <h2>PHP Info</h2>
    <p>Current Server Time: <?php echo date("Y-m-d H:i:s"); ?></p>
    <p>Server Software: <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'N/A'; ?></p>
    <p>PHP Version: <?php echo phpversion(); ?></p>
</body>
</html>
