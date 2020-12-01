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
                'name'=>'tom',
                'email' => 'tom@exapmle.com',
                'password' => "naoh1161",
                'introduction' => "hello Im Tom",
                'birthday' => '1999-06-01',
                'nationality' => "US",
            ],
            [
                'id' =>2,
                'name'=>'kume',
                'email' => 'kume@example.com',
                'password' => "naoh1161",
                'introduction' => "hello Im kume",
                'birthday' => '1989-02-01',
                'nationality' => "JA",
            ],
            [
                'id' =>3,
                'name'=>'mary',
                'email' => 'mary@example.com',
                'password' => "naoh1161",
                'introduction' => "hello Im mary",
                'birthday' => '1989-02-01',
                'nationality' => "EN",
            ],
            [
                'id' =>4,
                'name'=>'Jon',
                'email' => 'Jon@example.com',
                'password' => "naoh1161",
                'introduction' => "hello Im Jon",
                'birthday' => '1989-02-01',
                'nationality' => "EN",
            ],
            
        ];

        foreach ($dataSet as $data) {
            Menber::create($data);
        }
    }
}
