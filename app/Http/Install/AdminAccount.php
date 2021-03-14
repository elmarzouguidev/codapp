<?php

namespace App\Http\Install;

use App\Models\Admin;

use Spatie\Permission\Models\Role;

class AdminAccount
{
    public function setup($data)
    {

        $exists = Admin::whereEmail($data['email'])->exists();
        if(!$exists){

            $role = $this->createRole();

            $admin = Admin::create([
                'nom' => $data['first_name'],
                'prenom' => $data['last_name'],
                'email' => $data['email'],
                'password' => $data['password'],
                /**** */
                'city_id' => 1
            ]);

            $admin->assignRole($role);
       }
    }

    public function createRole(){

       return Role::forceCreate(['name' => 'super-admin','guard_name'=>'admin']);

    }

    private function getAdminRolePermissions()
    {
        return [
            // users
            'name'=>'admin.all','guard_name'=>'admin'

        ];
    }
}
