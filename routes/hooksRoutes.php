<?php

use Illuminate\Support\Facades\Route;

$url  = loadSetting('Hooks')->route;

Route::webhooks($url);

//
