<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use League\Flysystem\Filesystem;
use League\Flysystem\PhpseclibV2\SftpAdapter;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            Paginator::useBootstrap();

//        Storage::disk('sftp')->buildTemporaryUrlsUsing(function ($path, $expiration, $options) {
//            return URL::temporarySignedRoute(
//                'files.download',
//                $expiration,
//                array_merge($options, ['path' => $path])
//            );
//        });
    }
}
