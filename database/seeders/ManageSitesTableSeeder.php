<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManageSitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'key' => 'media',
                'value' => '{"logo":null,"favicon":"media/rdnXd1yVQ2rCImLGhA9tILg1ZanpzvJ8paNeQjSt.png","loader":"media/EX27lSjR0cnlRXfrdGPgOeJ2SLZ4qp8KZV2TScvz.gif"}',
                'created_at' => '2023-08-29 13:33:05',
                'updated_at' => '2023-08-30 19:37:50',
            ],
            [
                'id' => 2,
                'key' => 'basic_setting',
                'value' => '{"app_name":"Pakistan Online Store ( Online Bazaar )","home_page_title":"Pakistan Online Store ( Online Bazaar )"}',
                'created_at' => '2023-08-29 13:33:05',
                'updated_at' => '2023-08-30 18:39:15',
            ],
            [
                'id' => 3,
                'key' => 'home_page',
                'value' => '{"image1":"home_page/z6gzMRqEGtmY4Q3GB9Gr2RKiDO1dNRhm56PDlpik.jpg","image2":"home_page/Gp3ogKfZjoaiQfFbOXfMmIU8WZ9GVIcVNSZNdtDx.jpg","title1":"Amet earum sunt Nam","title2":"Numquam placeat qua","sub_title1":"Dolore magni et accu","sub_title2":"Qui modi quidem aliq","url1":"Quo totam eiusmod ir","url2":"Ut dolore aut ipsam"}',
                'created_at' => '2023-08-30 18:47:59',
                'updated_at' => '2023-08-30 19:01:34',
            ],
            [
                'id' => 4,
                'key' => 'home_page_meta',
                'value' => '{"meta_keyword":"$request->meta_keyword","meta_description":"$request->meta_description"}',
                'created_at' => '2023-08-30 19:43:38',
                'updated_at' => '2023-08-30 19:43:38',
            ],
            [
                'id' => 5,
                'key' => 'seo',
                'value' => '{"meta_keyword":"[{\"value\":\"asdfasdf\"},{\"value\":\"asdfa\"},{\"value\":\"sdf\"}]","meta_description":"asdfasdf"}',
                'created_at' => '2023-08-30 19:43:43',
                'updated_at' => '2023-08-30 19:44:43',
            ],
            [
                'id' => 6,
                'key' => 'footer',
                'value' => '{"address":null,"phone":"03179974132","email":"hilal.ahmad.developer@gmail.com","copyright":"https://localhost:900","facebook":"hilal.ahmad.developer@gmail.com","twitter":"hilal.ahmad.developer@gmail.com","youtube":"hilal.ahmad.developer@gmail.com","linkedin":"hilal.ahmad.developer@gmail.com"}',
                'created_at' => '2023-08-30 20:02:00',
                'updated_at' => '2023-08-31 13:34:04',
            ],
            [
                'id' => 11,
                'key' => 'first_three_column',
                'value' => '{"image1":"home_page/gIZEzIf3tBewMdUroXLATAsDSjAorwQT4u3AXVeS.jpg","image2":"home_page/35pza28WZDosBBGsQcP4tkLuiTcxbsw7XCluGtXu.jpg","image3":"home_page/XCLHBladM8FBp7AJ7lhBs3ItkuS8BC8FaJCkoJx5.jpg","title1":"Reprehenderit impedi","title2":"Recusandae Do qui l","sub_title1":"Perspiciatis odio e","sub_title2":"Sit expedita eu fugi","url1":"Est consequatur ipsa","title3":"Nihil quod unde volu","sub_title3":"Magna tempora ipsum","url3":"Qui sit aspernatur","url2":"Ipsam dolorem nobis"}',
                'created_at' => '2023-08-31 13:36:27',
                'updated_at' => '2023-08-31 20:13:04',
            ],
            [
                'id' => 12,
                'key' => 'second_three_column',
                'value' => '{"image1":"home_page/24ywzeBWT9FNTnU8GJcDocvw5oqQfHWks7igcsY6.jpg","image2":"home_page/GvuKa7bEONKfFL8JTFYsqPxCPsn1xZppwavuTawG.jpg","image3":"home_page/bDCIOwJxvvmZ5xhODMInVJwLn4RBTuz8mOg8ecN4.jpg","title1":"Dolorum sit tempor q","title2":"Blanditiis blanditii","sub_title1":"Molestiae voluptatem","sub_title2":"Quod qui ea eiusmod","url1":"Exercitationem quo N","title3":"Laboris anim non lab","sub_title3":"In sint ex libero qu","url3":"Laboriosam eaque et","url2":"Molestiae necessitat"}',
                'created_at' => '2023-08-31 13:37:00',
                'updated_at' => '2023-08-31 20:13:38',
            ],
            [
                'id' => 13,
                'key' => 'third_two_column',
                'value' => '{"image1":"home_page/h9xJCTzgtLX3R2EztfucaoUChdL8cpmkoI7sv7aI.jpg","image2":"home_page/7LPR5rRblWawRvBocONUIUTKquvTV2TSnC4NLiCH.jpg","title1":"Ut esse dolor corpor","title2":"Recusandae Aliquam","sub_title1":"Magna ut totam sed e","sub_title2":"Est dolor est place","url1":"Sed dolore officia v","url2":"Sed dolore officia v"}',
                'created_at' => '2023-08-31 13:37:34',
                'updated_at' => '2023-08-31 20:23:12',
            ],
            [
                'id' => 14,
                'key' => 'four_three_column',
                'value' => '{"image1":"$filename1","image2":"$filename2","image3":"$filename3","title1":"$request->title1","title2":"$request->title2","sub_title1":"$request->sub_title1","sub_title2":"$request->sub_title2","url1":"$request->url1","title3":"$request->title3","sub_title3":"$request->sub_title3","url3":"$request->url3","url2":"$request->url2"}',
                'created_at' => '2023-08-31 13:38:17',
                'updated_at' => '2023-08-31 13:38:17',
            ],
        ];

        foreach ($data as $row) {
            DB::table('manage_sites')->insert($row);
        }
    }
}
