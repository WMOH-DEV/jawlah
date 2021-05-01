<?php

namespace Database\Seeders;

use App\Models\admin\Category;
use App\Models\admin\City;
use App\Models\admin\Order;
use App\Models\admin\Role;
use App\Models\admin\Setting;
use App\Models\admin\Ticket;
use App\Models\admin\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name' => 'عضو',]);
        Role::create(['name' => 'تاجر',]);
        Role::create(['name' => 'أدمن',]);
        $user = User::create([
            'name' => 'Wael',
            'email' => 'wael@traveller.com',
            'password' => \Hash::make('waeltraveller'),
            'phone' => '12345678',
            'email_verified_at' => now(),
            'role_id' => '3',
        ]);

        User::factory()->count(50)->create();
        Category::factory()->count(50)->create();
        City::factory()->count(50)->create();
        Ticket::factory()->count(50)->create();
        Order::factory()->count(50)->create();
        Setting::create([
            'site_name' => 'دليل المسافر',
        ]);

    }
}
