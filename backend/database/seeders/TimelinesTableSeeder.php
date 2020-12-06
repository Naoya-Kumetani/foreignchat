<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timeline;

class TimelinesTableSeeder extends Seeder
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
                'member_id' => 1,
                'body' => 'Hi I want to study Japanese.',
            ],
            [
                'member_id' => 2,
                'body' => 'I want to talk with Chinese people',
            ],
            [
                'member_id' => 3,
                'body' => 'Please teach  me  Spanish',
            ],
        ];

        foreach ($dataSet as $data) {
            Timeline::create($data);
        }
    
    }
}
