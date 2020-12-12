<?php

namespace Database\Seeders;

use App\Models\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
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
                'member_id' => 2,
                'timeline_id' => 1,
                'body' => 'good',
            ],
            [
                'member_id' => 1,
                'timeline_id' => 1,
                'body' => 'nice！',
            ],
            [
                'member_id' => 1,
                'timeline_id' => 2,
                'body' => 'hello',
            ],
        ];

        foreach ($dataSet as $data) {
            Reply::create($data);
        }
    }
}