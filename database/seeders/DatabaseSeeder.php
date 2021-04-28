<?php

namespace Database\Seeders;

use App\Models\admin\Category;
use App\Models\admin\City;
use App\Models\admin\Role;
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

        User::factory()->count(50)->create();
        Category::factory()->count(50)->create();
        City::factory()->count(50)->create();
        Ticket::factory()->count(50)->create();


    }
}
