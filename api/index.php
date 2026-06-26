<?php

declare(strict_types=1);

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$basePath = dirname(__DIR__);

require $basePath . '/vendor/autoload.php';

$storagePath = $basePath . '/storage';

if (getenv('VERCEL')) {
    $storagePath = '/tmp/storage';

    $directories = [
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/views',
        '/tmp/storage/logs',
    ];

    foreach ($directories as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }

    // Symlink public storage if it doesn't exist
    $publicStorage = $basePath . '/public/storage';
    if (!is_link($publicStorage)) {
        @symlink('/tmp/storage/app/public', $publicStorage);
    }
}

$app = require $basePath . '/bootstrap/app.php';

if (method_exists($app, 'useStoragePath')) {
    $app->useStoragePath($storagePath);
}

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
