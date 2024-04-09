<?php
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/**
 * @Autoload-V1
 *
 * Automatic load for api v1 routes,
 * do not need to use imports
 */
Route::prefix('v1')->name('api.v1.')->group(function () {
    collect(File::allFiles(__DIR__ . '/v1'))->each(
        fn(SplFileInfo $file) => Route::namespace("\\v1")->group($file->getPathname())
    );
});

