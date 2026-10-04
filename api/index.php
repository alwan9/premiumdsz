<?php

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
        @mkdir($dir, 0755, true);
    }
}

// Forward request to Laravel public entrypoint
require __DIR__ . '/../public/index.php';

