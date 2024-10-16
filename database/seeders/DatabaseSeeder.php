<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            CategorySeeder::class,
            CurrencySeeder::class,
            InventorySeeder::class,
            OrderItemsSeeder::class,
            OrdersSeeder::class,
            // RolesAndPermissionsSeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            WardSeeder::class,
            DeliveryAddressSeeder::class,
            ConversationSeeder::class,
        ]);
    }
}
