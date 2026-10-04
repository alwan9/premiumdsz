<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Prepare writable directories in /tmp for Vercel Serverless environment
$dirs = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap',
    '/tmp/bootstrap/cache',
    '/tmp/views',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Set environment variables for serverless compatibility
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('SESSION_DRIVER=cookie');
putenv('CACHE_STORE=array');
putenv('CACHE_DRIVER=array');
putenv('LOG_CHANNEL=stderr');

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo "<div style='font-family:sans-serif;padding:24px;max-width:800px;margin:auto;'>";
    echo "<h2 style='color:#dc2626;'>Laravel Initialization Error</h2>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " on line " . $e->getLine() . "</p>";
    echo "<pre style='background:#f4f4f5;padding:16px;border-radius:8px;font-size:12px;overflow-x:auto;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}

