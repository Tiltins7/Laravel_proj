<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name'=> 'AdminUser',
            'surname' => 'surname',
            'VSN' => '123124Vn',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $user = User::create([
            'name'=> 'User',
            'surname' => 'surname',
            'VSN' => '123124V',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
