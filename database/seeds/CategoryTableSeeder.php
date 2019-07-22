<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'cate_name' => 'iphone',
                'cate_slug' => str_slug('iphone')
            ],
            [
                'cate_name' => 'samsung',
                'cate_slug' => str_slug('iphone')
            ]
        ];
        DB::table('vp_categoris')->insert($data);
    }
}
