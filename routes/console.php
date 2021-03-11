<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('env:clear', function() {


    $files = glob(storage_path('dotenv-editor/backups/{,.}*'), GLOB_BRACE); // get all file names
    foreach($files as $file){ // iterate files
        if(is_file($file)) {
            unlink($file); // delete file
        }
    }
    $this->comment('dotenv-editor/backups have been cleared!');

})->describe('Clear log files');

Artisan::command('log:clear', function() {

    exec('rm ' . storage_path('logs/*.log'));

    $this->comment('Logs have been cleared!');

})->describe('Clear log files');

Artisan::command('debugbar:clear', function() {

    exec('rm ' . storage_path('debugbar/*.json'));

    $this->comment('debugbar have been cleared!');

})->describe('Clear debugbar files');
