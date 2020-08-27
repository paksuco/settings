<?php

namespace Paksuco\Settings\Controllers;

class SettingsController extends \App\Http\Controllers\Controller
{
    public function settings()
    {
        return view("paksuco-settings::settings", [
            "extends" => config("settings-ui.template_to_extend", "layouts.app")
        ]);
    }

    public function management()
    {
        return view("paksuco-settings::management", [
            "extends" => config("settings-ui.template_to_extend", "layouts.app")
        ]);
    }
}
