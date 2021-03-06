<?php

/**
 * Routes for the package would go here
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config("settings-ui.admin_route_prefix", ""),
    'as' => 'paksuco.',
    'middleware' => config("settings-ui.middleware"),
], function () {
    Route::get('/settings', "\Paksuco\Settings\Controllers\SettingsController@settings")->name("settings.admin");
    Route::get('/settings/management', "\Paksuco\Settings\Controllers\SettingsController@management")->name("settings.management");
});
