# Role Permission management package

### This will create route level role, so that anyone can create permission for any route

<br><br>

To Install this package run

    composer require jahir/permission

Publish public folders to add assets

    php artisan vendor:publish --tag=public --force

Add Service provider from <b>config/app.config</b>

    'providers' => [
        ...
        Jahir\Permission\PermissionServiceProvider::class,
    ],

Migrate all table which are require

    php artisan migrate
