<?php
if (!headers_sent()) {
    header('Content-Type: text/html');
}



// First, attempt to get OBG_BASE from the $_SERVER variable
$OBG_BASE = isset($_SERVER['OBG_BASE']) ? $_SERVER['OBG_BASE'] : null;

// If not found, load from .env file relative to the script directory
if (!$OBG_BASE) {
    $envFilePath = __DIR__ . '/.env';

    // Function to load environment variables from .env
    function loadEnv($filePath) {
        if (!file_exists($filePath)) {
            throw new Exception("Environment file not found at $filePath");
        }
        $envVars = [];
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue; // Skip comments
            }
            list($name, $value) = explode('=', $line, 2);
            $envVars[$name] = trim($value);
        }
        return $envVars;
    }

    // Load .env file and set OBG_BASE if APP_BASE is available
    $env = loadEnv($envFilePath);
    $OBG_BASE = $env['APP_BASE'] ?? __DIR__; // Defaults to script's directory if APP_BASE not found
}


// Start Laravel with a unique port to identify it
$port = "8000"; // Laravel's default port

// Check OS and execute the appropriate command
if (stripos(PHP_OS, 'WIN') === 0) {
    // Windows command to start Laravel in the background
    $command = 'php7.4 ' . $OBG_BASE . '/www/artisan serve --port=' . $port;
    pclose(popen('start /B cmd /C "' . $command . ' > nul 2>&1"', 'r'));
} else {
    // Ubuntu command to start Laravel in the background
    $command = 'php7.4 ' . $OBG_BASE . '/www/artisan serve --port=' . $port . ' > /dev/null 2>&1 &';
    exec($command);
}

// Store the port number for identification
file_put_contents($OBG_BASE . '/www/storage/laravel.port', $port);

sleep(2);

if (!headers_sent()) {
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
} else {
    echo "Starting Laravel service... ";
    echo "<script>setTimeout(function() { window.location.href = '" . 
         htmlspecialchars($_SERVER['REQUEST_URI']) . 
         "'; }, 3000);</script>";
    echo "You will be redirected in 3 seconds...";
}
