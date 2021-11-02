<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Status;
use App\Models\User;
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
        $this->call(LaratrustSeeder::class);

        Status::truncate();
        Status::create([
            'name' => 'Created',
            'isOnline' => 0
        ]);
        Status::create([
            'name' => 'Pickup',
            'isOnline' => 1
        ]);
        Status::create([
            'name' => 'Picked Up',
            'isOnline' => 1
        ]);
        Status::create([
            'name' => 'Washed',
        ]);
        Status::create([
            'name' => 'Packed',
        ]);
        Status::create([
            'name' => 'Deliver',
            'isOnline' => 1
        ]);
        Status::create([
            'name' => 'Delivered',
            'isOnline' => 1
        ]);
        Status::create([
            'name' => 'Claimed',
            'isOnline' => 0
        ]);
        Status::create([
            'name' => 'Cancelled',
        ]);

        Type::truncate();
        Type::create([
            'name' => 'Dry Clean',
            'rate' => 25
        ]);
        Type::create([
            'name' => 'Wash',
            'rate' => 30
        ]);

        User::truncate();
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$ckPGkhU4IkAiRvYHD5/2euwD41MhqCaYXHvcXkXjO./KP.yjroW7G'
        ]);
        $user->attachRole(1);
    }
}
