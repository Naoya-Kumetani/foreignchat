<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Learning_language;

class Learning_languagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSet=[
            [
                'id' =>1,
                'member_id'=>'1',
                'language' => 'Japanese'
            ],
            [
                'id' =>2,
                'member_id'=>'1',
                'language' => 'English',
            ],
            [
                'id' =>3,
                'member_id'=>'1',
                'language' => 'French',
            ]
            ];

            foreach ($dataSet as $data) {
                Learning_language::create($data);
            }
        
    }
}
