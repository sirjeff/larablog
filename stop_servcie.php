<?php

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

// Now OBG_BASE is either from $_SERVER['OBG_BASE'] or from the .env file
$pid_file = "$OBG_BASE/www/storage/laravel.port";


if (file_exists($pid_file)) {
 $port = file_get_contents($pid_file);
 
 // Check if the server is running on Windows or Linux (Ubuntu)
 if (stripos(PHP_OS, 'WIN') === 0) {
  // Windows-specific command to find and kill processes
  exec("netstat -ano | findstr :$port", $output);
  foreach ($output as $line) {
   if (preg_match('/LISTENING\s+(\d+)/', $line, $matches)) {
    $pid = $matches[1];
    exec("taskkill /PID $pid /F /T");
   }
  }
 } else {
  // Ubuntu-specific command to find and kill processes
  exec("lsof -i :$port", $output);
  foreach ($output as $line) {
   if (preg_match('/php.*\s+(\d+)\s+/', $line, $matches)) {
    $pid = $matches[1];
    exec("kill -9 $pid");
   }
  }
 }
 
 // Remove the port file after stopping the service
 unlink($pid_file);
 echo "Service stopped";
} else {
 echo "No port file found";
}
