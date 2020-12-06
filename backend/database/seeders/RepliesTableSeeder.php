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
                'body' => 'ミニブログデビューおめでとう！',
            ],
            [
                'member_id' => 1,
                'timeline_id' => 1,
                'body' => 'ありがとう！',
            ],
            [
                'member_id' => 1,
                'timeline_id' => 2,
                'body' => 'ユーザーID: 1 の返信だよ',
            ],
        ];

        foreach ($dataSet as $data) {
            Reply::create($data);
        }
    }
}