<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Fix server globals for Laravel routing on Vercel
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['DOCUMENT_ROOT'] = __DIR__ . '/../public';

// Ensure writable storage and views directories exist in /tmp
$storagePath = '/tmp/storage';
$dirs = [
    $storagePath,
    $storagePath . '/app',
    $storagePath . '/app/public',
    $storagePath . '/framework',
    $storagePath . '/framework/views',
    $storagePath . '/framework/cache',
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/sessions',
    $storagePath . '/logs',
    '/tmp/views',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo "<!DOCTYPE html><html><head><title>Application Error</title><style>body{font-family:sans-serif;padding:30px;background:#f8fafc;color:#1e293b}pre{background:#0f172a;color:#f8fafc;padding:20px;border-radius:12px;overflow-x:auto;font-size:13px}.badge{background:#fee2e2;color:#ef4444;padding:4px 8px;border-radius:6px;font-weight:bold;font-size:12px}</style></head><body>";
    echo "<span class='badge'>Error on Vercel</span>";
    echo "<h2>" . htmlspecialchars($e->getMessage()) . "</h2>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " (Line " . $e->getLine() . ")</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</body></html>";
}

