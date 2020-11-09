<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menber;

class MenbersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSet = [
            [
                'id' =>1,
                'name'=>'田中 一郎',
                'email' => 'i.tanaka@email.com',
                'password' => "password",
                'introduction' => "僕は田中 一郎です。よろしくお願いします！",
                'birthday' => '1999-06-01',
                'nationality' => "US",
            ],
            [
                'id' =>2,
                'name'=>'佐藤 花子',
                'email' => 'h.sato@email.com',
                'password' => "password",
                'introduction' => "私は佐藤 花子です。よろしくお願いします！",
                'birthday' => '1989-02-01',
                'nationality' => "JA",
            ],
            
        ];

        foreach ($dataSet as $data) {
            Menber::create($data);
        }
    }
}
