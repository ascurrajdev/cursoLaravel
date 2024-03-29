<?php

namespace App\Providers;

use League\Flysystem\Filesystem;
use Storage;
use Illuminate\Support\ServiceProvider;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Spatie\Dropbox\Client as DropboxClient;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('dropbox',function($app,$config){
            $client = new DropboxClient(
                $config['authorization_token']
            );
            return new Filesystem(new DropboxAdapter($client));
        });
    }
}
