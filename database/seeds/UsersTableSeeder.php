<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credentials = array(
            "email" => 'admin@admin.com',
            "password" => 'password',
            "first_name" => 'Admin',
            "last_name" => 'Boy',
        );
        $user = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::registerAndActivate($credentials);
        $role = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::findRoleBySlug('admin');
        $role->users()->attach($user);
        //assign user to branch
        $permission = new \App\Models\BranchUser();
        $permission->branch_id = 1;
        $permission->user_id = 1;
        $permission->save();
    }
}
