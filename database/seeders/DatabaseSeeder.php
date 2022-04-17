<?php

namespace Database\Seeders;

use App\Models\ListService;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        //Create random user
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()
            ->count(10)
            ->state(new Sequence(
                ['account' => 'customer'],
            ))
            ->create();

        \App\Models\User::factory()
            ->count(10)
            ->state(new Sequence(
                ['account' => 'admin'],
            ))
            ->create();

        \App\Models\User::factory()
            ->count(10)
            ->state(new Sequence(
                ['account' => 'mechanic'],
            ))
            ->create();

        //Create random service
        \App\Models\Service::factory(30)->create();

        //Create list Service
        ListService::create([
            'service_name' => 'Ganti Cat Mobil',
            'service_price' => '300000'
        ]);
        ListService::create([
            'service_name' => 'Ganti Ban Mobil',
            'service_price' => '100000'
        ]);
        ListService::create([
            'service_name' => 'Ganti Kaca Mobil',
            'service_price' => '200000'
        ]);
        ListService::create([
            'service_name' => 'Ganti Oli Mobil',
            'service_price' => '80000'
        ]);

        ListService::create([
            'service_name' => 'Ganti Kursi Mobil',
            'service_price' => '250000'
        ]);

        // //Create list Service
        // ListService::create([
        //     'service_name' => 'Ganti Cat Mobil',
        //     'service_price' => '300000'
        // ]);
        // ListService::create([
        //     'service_name' => 'Ganti Ban Mobil',
        //     'service_price' => '100000'
        // ]);
        // ListService::create([
        //     'service_name' => 'Ganti Kaca Mobil',
        //     'service_price' => '200000'
        // ]);
        // ListService::create([
        //     'service_name' => 'Ganti Oli Mobil',
        //     'service_price' => '80000'
        // ]);

        // ListService::create([
        //     'service_name' => 'Ganti Kursi Mobil',
        //     'service_price' => '250000'
        // ]);
        // //Create list Service
        // ListService::create([
        //     'service_name' => 'Ganti Cat Mobil',
        //     'service_price' => '300000'
        // ]);
        // ListService::create([
        //     'service_name' => 'Ganti Ban Mobil',
        //     'service_price' => '100000'
        // ]);
        // ListService::create([
        //     'service_name' => 'Ganti Kaca Mobil',
        //     'service_price' => '200000'
        // ]);
        // ListService::create([
        //     'service_name' => 'Ganti Oli Mobil',
        //     'service_price' => '80000'
        // ]);

        // ListService::create([
        //     'service_name' => 'Ganti Kursi Mobil',
        //     'service_price' => '250000'
        // ]);
        // //Create list Service
        // ListService::create([
        //     'service_name' => 'Ganti Cat Mobil',
        //     'service_price' => '300000'
        // ]);
        // ListService::create([
        //     'service_name' => 'Ganti Ban Mobil',
        //     'service_price' => '100000'
        // ]);
        // ListService::create([
        //     'service_name' => 'Ganti Kaca Mobil',
        //     'service_price' => '200000'
        // ]);
        // ListService::create([
        //     'service_name' => 'Ganti Oli Mobil',
        //     'service_price' => '80000'
        // ]);

        // ListService::create([
        //     'service_name' => 'Ganti Kursi Mobil',
        //     'service_price' => '250000'
        // ]);

        // //Create random service list services
        \App\Models\ServiceListServices::factory(30)->create();
    }
}
