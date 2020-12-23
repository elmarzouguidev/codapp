<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

if (Schema::hasColumn('settings','name')) {

    Route::webhooks(loadSetting('Hooks')->route);
} else {
    Route::webhooks('webhooks');
}
