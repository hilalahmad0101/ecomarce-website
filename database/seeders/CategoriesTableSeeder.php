<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 4,
                'image' => 'category/OXqPUDyHDf3xSuUbxCdnFMPVYE6r3yz0WGIH97YC.jpg',
                'name' => 'Women Clothing',
                'slug' => 'women-clothing',
                'meta_keyword' => '[{"value":"Women"},{"value":"clothing"},{"value":"cloth"},{"value":"brand"}]',
                'meta_description' => 'women clothing',
                'serial' => 1,
                'status' => 1,
                'created_at' => '2023-08-11 13:11:48',
                'updated_at' => '2023-08-11 13:11:48',
            ],
            [
                'id' => 5,
                'image' => 'category/W1f3JuOS4gU4d0pgpRWvu9i3rkENHnkCJNrtL102.jpg',
                'name' => 'Sports & Entertainment',
                'slug' => 'sports-entertainment',
                'meta_keyword' => '[{"value":"sport"},{"value":"entertainment"},{"value":"shorts"}]',
                'meta_description' => 'Sports & Entertainment',
                'serial' => 1,
                'status' => 1,
                'created_at' => '2023-09-02 11:52:11',
                'updated_at' => '2023-09-02 11:52:11',
            ],
            [
                'id' => 6,
                'image' => 'category/7u8Dk9NgUE3MkkqtGghcBmK5yWE0HjFBcBG4sSe4.jpg',
                'name' => 'Vehicles & Accessories',
                'slug' => 'vehicles-accessories',
                'meta_keyword' => '[{"value":"vehicles"},{"value":"accessories"},{"value":"cars"},{"value":"dats"}]',
                'meta_description' => 'Vehicles & Accessories',
                'serial' => 1,
                'status' => 1,
                'created_at' => '2023-09-02 11:52:48',
                'updated_at' => '2023-09-02 11:52:48',
            ],
            [
                'id' => 7,
                'image' => 'category/S7lYVEdihuvSi1OdtIZ0qKhtZ6Elv9t26pzc2Cyp.jpg',
                'name' => 'Beauty & Personal Care',
                'slug' => 'beauty-personal-care',
                'meta_keyword' => '[{"value":"beauty"},{"value":"personal"},{"value":"care"},{"value":"datascience"}]',
                'meta_description' => 'Beauty & Personal Care',
                'serial' => 1,
                'status' => 1,
                'created_at' => '2023-09-02 11:53:24',
                'updated_at' => '2023-09-02 11:53:24',
            ],
        ];

        foreach ($data as $row) {
            DB::table('categories')->insert($row);
        }
    }
}
