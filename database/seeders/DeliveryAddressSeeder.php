<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;
use App\Models\User;
use App\Models\Ward;
use Faker\Factory as Faker;

class DeliveryAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy các user, ward, district và province để seed địa chỉ giao hàng
        $users = User::all();
        $wards = Ward::with('district.province')->get(); // Lấy ward cùng với district và province liên quan

        foreach ($users as $user) {
            foreach ($wards->random(3) as $ward) { // Mỗi user có 3 địa chỉ giao hàng giả
                DeliveryAddress::create([
                    'user_id' => $user->id,
                    'consignee_name' => $faker->name,
                    'phone_number' => $faker->phoneNumber,
                    'specific' => $faker->streetAddress,
                    'street' => $faker->streetName,
                    'wards_id' => $ward->id,
                    'districts_id' => $ward->district->id,
                    'provinces_id' => $ward->district->province->id,
                    'is_default'=>false,
                ]);
            }
        }
    }
}
