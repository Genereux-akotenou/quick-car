<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where('email', 'admin@gmail.com')->first()){
            $user = new User([
                'name'      =>'Généreux AKOTENOU',
                'role'      =>'ROLE_ADMIN',
                'telephone' =>'61205472',
                'email'     =>'admin@gmail.com',
                'password'  => bcrypt('admin01laravel')
            ]);
            $user->save();
        }
    }
}
