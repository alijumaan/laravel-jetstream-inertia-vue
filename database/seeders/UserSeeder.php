<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $supervisor = User::create([
            'name' => 'supervisor',
            'username' => 'supervisor',
            'email' => 'supervisor@supervisor.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $inspector = User::create([
            'name' => 'inspector',
            'username' => 'inspector',
            'email' => 'inspector@inspector.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ]);

        $supply = User::create([
            'name' => 'supply',
            'username' => 'supply',
            'email' => 'supply@supply.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ]);

        $admin->assignRole('admin');
        $supervisor->assignRole('supervisor');
        $inspector->assignRole('inspector');
        $supply->assignRole('supply');
    }
}
