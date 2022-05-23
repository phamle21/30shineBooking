<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\ImagesService;
use App\Models\Promotion;
use App\Models\Rating;
use App\Models\Service;
use App\Models\ServiceStore;
use App\Models\Store;
use App\Models\User;
use App\Models\UserStore;
use App\Models\RewardPoint;
use Database\Factories\UserStoreFactory;
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
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'phone' => '0941649826',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(60),
            ],
            [
                'role' => UserRole::Admin_Store,
                'name' => 'Admin_MauThan',
                'email' => 'admin_MauThan@gmail.com',
                'phone' => '0941649825',
                'username' => 'admin_MauThan',
                'password' => Hash::make('admin'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(60),
            ],
        ]);

        Promotion::insert([
            'code' => '',
            'start_at' => now(),
            'end_at' => now(),
            'description' => 'Không có khuyến mãi'
        ]);

        User::factory(20)->create();
        Service::factory(20)->create();
        Store::factory(5)->create();
        ServiceStore::factory(5)->create();
        UserStore::factory(5)->create();
        Promotion::factory(5)->create();
        Booking::factory(10)->create();

        foreach (Booking::all() as $v) {
            BookingDetail::factory()->create([
                'booking_id' => $v->id
            ]);
        }

        BookingDetail::factory(30)->create();

        foreach (Booking::all() as $v) {
            Booking::find($v->id)->update([
                'total' => $v->total()
            ]);
        }

        foreach (User::all() as $v) {
            RewardPoint::factory()->create([
                'user_id' => $v->id,
            ]);
        }

        Rating::factory(10)->create();

        foreach (Service::all() as $v) {
            ImagesService::factory()->create([
                'service_id' => $v->id,
            ]);
        }
        ImagesService::factory(100)->create();
    }
}
