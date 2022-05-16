<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Service;
use App\Models\ServiceStore;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'role' => UserRole::Admin,
                'fullname' => 'Administrator',
                'email' => 'admin@gmail.com',
                'phone' => '0941649826',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(60),
            ],
            [
                'role' => UserRole::Admin_Store,
                'fullname' => 'Admin_MauThan',
                'email' => 'admin_MauThan@gmail.com',
                'phone' => '0941649825',
                'username' => 'admin_MauThan',
                'password' => Hash::make('admin'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(60),
            ],
        ]);

        User::factory(5)->create();
        Service::factory(20)->create();
        Store::factory(5)->create();
        ServiceStore::factory(5)->create();


    }
}
