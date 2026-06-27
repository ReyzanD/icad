<?php

declare(strict_types=1);

use Illuminate\Http\Request;

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '');

$publicPath = __DIR__ . '/public';

// Serve existing static files directly
if ($uri !== '/' && file_exists($file = $publicPath . $uri)) {
    $mimeTypes = [
        'txt' => 'text/plain',
        'html' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'webp' => 'image/webp',
        'gif' => 'image/gif',
        'ico' => 'image/vnd.microsoft.icon',
        'svg' => 'image/svg+xml',
        'ttf' => 'font/ttf',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'otf' => 'font/otf',
    ];

    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $contentType = $mimeTypes[$ext] ?? 'application/octet-stream';

    header("Content-Type: $contentType; charset=UTF-8");
    if (str_starts_with($uri, '/build/')) {
        header('Cache-Control: public, max-age=31536000, immutable');
    }
    readfile($file);
    exit;
}

// Prevent Vercel edge caching for HTML
header('Cache-Control: private, no-cache, no-store');

define('LARAVEL_START', microtime(true));

$basePath = __DIR__;

require $basePath . '/vendor/autoload.php';

// Vercel: force HTTPS scheme for URL generation
if (getenv('VERCEL')) {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;

// Vercel: use /tmp for writable storage
    $storagePath = getenv('APP_STORAGE_PATH') ?: '/tmp/storage';
    $dirs = [
        "$storagePath/framework/cache/data",
        "$storagePath/framework/sessions",
        "$storagePath/framework/views",
        "$storagePath/logs",
    ];
    foreach ($dirs as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }
}

$app = require $basePath . '/bootstrap/app.php';

if (getenv('VERCEL') && method_exists($app, 'useStoragePath')) {
    $app->useStoragePath(getenv('APP_STORAGE_PATH') ?: '/tmp/storage');
}

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request = Request::capture())->send();
$kernel->terminate($request, $response);
