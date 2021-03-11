<?php

namespace App\Http\Controllers\Installer;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Install\AdminAccount;
use App\Http\Install\App;
use App\Http\Install\City;
use App\Http\Install\Database;
use App\Http\Install\Requirement;
use App\Http\Middleware\RedirectIfInstalled;
use App\Http\Requests\InstallRequest;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class InstallController extends Controller
{
    public function __construct()
    {
        $this->middleware(RedirectIfInstalled::class);
    }

    public function preInstallation(Requirement $requirement)
    {
        return view('install.pre_installation', compact('requirement'));
    }

    public function getConfiguration(Requirement $requirement)
    {
        if (! $requirement->satisfied()) {

            return redirect()->route('install.pre_installation');
        }

        return view('install.configuration', compact('requirement'));
    }
    public function postConfiguration(
        InstallRequest $request,
        Database $database,
        City $city,
        AdminAccount $admin,
        App $app
    ) {
        @set_time_limit(0);

        try {
            $database->setup($request->db);
            $city->setup();
            $admin->setup($request->admin);
            $app->setup();
            return redirect()->route('install.complete');
        } catch (Exception $e) {
            return back()->withInput()
                ->with('error', $e->getMessage());
        }


    }

    public function complete()
    {
        if (config('app.installed')) {
            return redirect()->route('home');
        }

        $env = DotenvEditor::load();
        $env->setKey('APP_INSTALLED', 'true');
        $env->save();

        return view('install.complete');
    }
}
