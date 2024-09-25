<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            ['name' => 'An Giang', 'type' => 'tỉnh'],
            ['name' => 'Bà Rịa - Vũng Tàu', 'type' => 'tỉnh'],
            ['name' => 'Bạc Liêu', 'type' => 'tỉnh'],
            ['name' => 'Bắc Giang', 'type' => 'tỉnh'],
            ['name' => 'Bắc Kạn', 'type' => 'tỉnh'],
            ['name' => 'Bắc Ninh', 'type' => 'tỉnh'],
            ['name' => 'Bến Tre', 'type' => 'tỉnh'],
            ['name' => 'Bình Dương', 'type' => 'tỉnh'],
            ['name' => 'Bình Định', 'type' => 'tỉnh'],
            ['name' => 'Bình Phước', 'type' => 'tỉnh'],
            ['name' => 'Bình Thuận', 'type' => 'tỉnh'],
            ['name' => 'Cà Mau', 'type' => 'tỉnh'],
            ['name' => 'Cao Bằng', 'type' => 'tỉnh'],
            ['name' => 'Cần Thơ', 'type' => 'thành phố'],
            ['name' => 'Đà Nẵng', 'type' => 'thành phố'],
            ['name' => 'Đắk Lắk', 'type' => 'tỉnh'],
            ['name' => 'Đắk Nông', 'type' => 'tỉnh'],
            ['name' => 'Điện Biên', 'type' => 'tỉnh'],
            ['name' => 'Đồng Nai', 'type' => 'tỉnh'],
            ['name' => 'Đồng Tháp', 'type' => 'tỉnh'],
            ['name' => 'Gia Lai', 'type' => 'tỉnh'],
            ['name' => 'Hà Giang', 'type' => 'tỉnh'],
            ['name' => 'Hà Nam', 'type' => 'tỉnh'],
            ['name' => 'Hà Nội', 'type' => 'thành phố'],
            ['name' => 'Hà Tĩnh', 'type' => 'tỉnh'],
            ['name' => 'Hải Dương', 'type' => 'tỉnh'],
            ['name' => 'Hải Phòng', 'type' => 'thành phố'],
            ['name' => 'Hậu Giang', 'type' => 'tỉnh'],
            ['name' => 'Hòa Bình', 'type' => 'tỉnh'],
            ['name' => 'Hưng Yên', 'type' => 'tỉnh'],
            ['name' => 'Khánh Hòa', 'type' => 'tỉnh'],
            ['name' => 'Kiên Giang', 'type' => 'tỉnh'],
            ['name' => 'Kon Tum', 'type' => 'tỉnh'],
            ['name' => 'Lai Châu', 'type' => 'tỉnh'],
            ['name' => 'Lâm Đồng', 'type' => 'tỉnh'],
            ['name' => 'Lạng Sơn', 'type' => 'tỉnh'],
            ['name' => 'Lào Cai', 'type' => 'tỉnh'],
            ['name' => 'Long An', 'type' => 'tỉnh'],
            ['name' => 'Nam Định', 'type' => 'tỉnh'],
            ['name' => 'Nghệ An', 'type' => 'tỉnh'],
            ['name' => 'Ninh Bình', 'type' => 'tỉnh'],
            ['name' => 'Ninh Thuận', 'type' => 'tỉnh'],
            ['name' => 'Phú Thọ', 'type' => 'tỉnh'],
            ['name' => 'Phú Yên', 'type' => 'tỉnh'],
            ['name' => 'Quảng Bình', 'type' => 'tỉnh'],
            ['name' => 'Quảng Nam', 'type' => 'tỉnh'],
            ['name' => 'Quảng Ngãi', 'type' => 'tỉnh'],
            ['name' => 'Quảng Ninh', 'type' => 'tỉnh'],
            ['name' => 'Quảng Trị', 'type' => 'tỉnh'],
            ['name' => 'Sóc Trăng', 'type' => 'tỉnh'],
            ['name' => 'Sơn La', 'type' => 'tỉnh'],
            ['name' => 'Tây Ninh', 'type' => 'tỉnh'],
            ['name' => 'Thái Bình', 'type' => 'tỉnh'],
            ['name' => 'Thái Nguyên', 'type' => 'tỉnh'],
            ['name' => 'Thanh Hóa', 'type' => 'tỉnh'],
            ['name' => 'Thừa Thiên Huế', 'type' => 'tỉnh'],
            ['name' => 'Tiền Giang', 'type' => 'tỉnh'],
            ['name' => 'TP. Hồ Chí Minh', 'type' => 'thành phố'],
            ['name' => 'Trà Vinh', 'type' => 'tỉnh'],
            ['name' => 'Tuyên Quang', 'type' => 'tỉnh'],
            ['name' => 'Vĩnh Long', 'type' => 'tỉnh'],
            ['name' => 'Vĩnh Phúc', 'type' => 'tỉnh'],
            ['name' => 'Yên Bái', 'type' => 'tỉnh'],
        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
