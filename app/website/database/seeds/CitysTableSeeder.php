<?php

use Illuminate\Database\Seeder;

class CitysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citys = [
            ['name' => 'Hà Nội',
            'slug' => 'ha_noi',
            'image_url' => ' ',
            ],
            ['name' => 'Đà Nẵng',
            'slug' => 'da_nang',
            'image_url' => ' ',
            ],
            ['name' => 'Hồ Chí Minh',
            'slug' => 'ho_chi_minh',
            'image_url' => ' ',
            ],
            ['name' => 'Đà Lạt',
            'slug' => 'da_lat',
            'image_url' => ' ',
            ],
        ];
        foreach ($citys as $city) {
            if (!DB::table('cities')->where('name', $city['name'])->first()) {
                DB::table('cities')->insert([
                    'name' => $city['name'],
                    'slug' => $city['slug'],
                    'image_url' => $city['image_url'],
                ]);
            }
        }
    }
}
