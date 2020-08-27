<?php

/**
 * Routes for the package would go here
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config("settings-ui.admin_route_prefix", ""),
    'as' => 'paksuco.',
], function () {
    Route::get('/settings', "\Paksuco\Settings\Controllers\SettingsController@index")->name("settings.admin");
});
