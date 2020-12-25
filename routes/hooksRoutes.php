<?php

use Illuminate\Support\Facades\Route;

$url  = loadSetting('Hooks')->app_platform;

Route::webhooks($url);


//
