<?php

namespace \Paksuco\Settings\Controllers;

class SettingsController extends \App\Controllers\Controller
{
    public function index()
    {
        return view("paksuco-settings::container");
    }
}
