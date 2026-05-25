<?php
/**
 * Error Configuration Helper
 * This file helps with debugging during development
 */

// For Development: Show all errors (comment out for production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// For Production: Hide errors from users, log instead
// error_reporting(E_ALL);
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
// ini_set('error_log', __DIR__ . '/error.log');

// Custom error handler
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    echo "Error [$errno] in $errfile on line $errline: $errstr";
    return true;
});

// Handle fatal errors
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error) {
        echo "Fatal Error: " . $error['message'] . " in " . $error['file'] . " on line " . $error['line'];
    }
});
?>
