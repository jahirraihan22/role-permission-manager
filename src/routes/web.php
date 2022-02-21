<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Jahir\Permission\Http\Controllers'],function (){
    Route::get('permission/list','PermissionController@index')->name('permission.list');
    Route::get('permission/create','PermissionController@create')->name('permission.create');
    Route::post('permission/store','PermissionController@store')->name('permission.store');
    Route::get('permission/list','PermissionController@index')->name('permission.list');

    Route::get('role/list','RoleController@index')->name('role.list');
    Route::get('role/create','RoleController@create')->name('role.create');
    Route::post('role/store','RoleController@store')->name('role.store');
    Route::get('role/list','RoleController@index')->name('role.list');
});