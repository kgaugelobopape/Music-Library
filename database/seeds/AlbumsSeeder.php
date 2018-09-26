<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert(
            [
                [
                    'name' => 'Pour Me Water - Single',
                    'cover' => 'Pour-Me-Water-Single.jpg',
                    'genre' => 'Pop',
                    'year' => '2017',
                    'artist' => 'Mr Eazi',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'We Are All We Need',
                    'cover' => 'Weareallweneedalbum.jpg',
                    'genre' => 'Dance',
                    'year' => '2012',
                    'artist' => 'Above & Beyond',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Love, Simon (Original Motion Picture Soundtrack)',
                    'cover' => 'lovesimon.jpg',
                    'genre' => 'R&B/Soul',
                    'year' => '2018',
                    'artist' => 'Khalid & Normani',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
