<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Status;
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

        Status::create([
            'name' => 'Created',
        ]);
        Status::create([
            'name' => 'Picked Up',
        ]);
        Status::create([
            'name' => 'Washed',
        ]);
        Status::create([
            'name' => 'Ironed and Folded',
        ]);
        Status::create([
            'name' => 'Delivered',
        ]);
        Status::create([
            'name' => 'Claimed',
        ]);
        Status::create([
            'name' => 'Cancelled',
        ]);

        Type::create([
            'name' => 'Dry Clean',
            'rate' => 25
        ]);
        Type::create([
            'name' => 'Wash',
            'rate' => 30
        ]);
    }
}
