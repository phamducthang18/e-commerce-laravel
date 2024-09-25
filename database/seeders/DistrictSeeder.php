<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\Province;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $types = ['Quận', 'Huyện', 'Thị xã', 'Thành phố'];
        foreach (Province::all() as $province) {
            for ($i = 1; $i <= 5; $i++) {
                District::create([
                    'name' => 'Quận' . $i,
                    'type' => $types[array_rand($types)],
                    'province_id' => $province->id,
                ]);
            }
        }
    }
}
