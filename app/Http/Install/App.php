<?php


namespace App\Http\Install;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Artisan;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class App
{


    public function setup()
    {
        $this->generateAppKey();
        $this->setEnvVariables();
        $this->createCustomerRole();

    }

    private function generateAppKey()
    {
        Artisan::call('key:generate', ['--force' => true]);
    }

    private function setEnvVariables()
    {
        $env = DotenvEditor::load();

        $env->setKey('APP_ENV', 'production');
        $env->setKey('APP_DEBUG', 'false');
        $env->setKey('APP_CACHE', 'true');
        $env->setKey('APP_URL', url('/'));

        $env->setKey('APP_INSTALLED','true');
        $env->save();
    }

    private function createCustomerRole()
    {
        Role::create(['name' => 'human-resource', 'guard_name'=>'admin']);
    }

    private function createInvoicesFolder()
    {
        mkdir(public_path('invoices'));
    }
}
