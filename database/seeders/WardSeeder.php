<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ward;
use App\Models\District;

class WardSeeder extends Seeder
{
    public function run()
    {
        $types = ['Phường', 'Xã', 'Thị trấn'];
        foreach (District::all() as $district) {
            for ($i = 1; $i <= 5; $i++) { // Tạo 5 phường/xã giả lập cho mỗi quận/huyện
                Ward::create([
                    'name' => '' . $i,
                    'type' => $types[array_rand($types)],
                    'district_id' => $district->id,
                ]);
            }
        }
    }
}
