<?php
namespace Jahir\Permission;

use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','permission');
        $this->publishes([
            __DIR__.'/public' => public_path('permission_dist'),
        ], 'public');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register(){

    }
}