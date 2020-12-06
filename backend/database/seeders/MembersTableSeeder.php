<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MembersTableSeeder extends Seeder
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
                'name'=>'Lee',
                'email' => 'lee@exapmle.com',
                'password' => "password",
                'introduction' => "hello Im Lee",
                'birth_year' => '1999',
                'native_language' => "Korean",
            ],
            [
                'id' =>2,
                'name'=>'kume',
                'email' => 'kume@example.com',
                'password' => "password",
                'introduction' => "hello Im kume",
                'birth_year' => '1989',
                'native_language' => "Japanese",
            ],
            [
                'id' =>3,
                'name'=>'mary',
                'email' => 'mary@example.com',
                'password' => "password",
                'introduction' => "hello Im mary",
                'birth_year' => '1989',
                'native_language' => "English",
            ],
            [
                'id' =>4,
                'name'=>'Jon',
                'email' => 'jon@example.com',
                'password' => "password",
                'introduction' => "hello Im Jon",
                'birth_year' => '1988',
                'native_language' => "English",
            ],
            [
                'id' =>5,
                'name'=>'park',
                'email' => 'park@example.com',
                'password' => "password",
                'introduction' => "hello Im park",
                'birth_year' => '1980',
                'native_language' => "Korean",
            ],
            [
                'id' =>6,
                'name'=>'xabi',
                'email' => 'xabi@example.com',
                'password' => "password",
                'introduction' => "hello Im xabi",
                'birth_year' => '1989',
                'native_language' => "Spanish",
            ],
            [
                'id' =>7,
                'name'=>'kante',
                'email' => 'kante@example.com',
                'password' => "password",
                'introduction' => "hello Im kante",
                'birth_year' => '1995',
                'native_language' => "French",
            ],
            [
                'id' =>8,
                'name'=>'ezil',
                'email' => 'ezil@example.com',
                'password' => "password",
                'introduction' => "hello Im ezil",
                'birth_year' => '1989',
                'native_language' => "German",
            ],
            [
                'id' =>9,
                'name'=>'alonzo',
                'email' => 'alonzo@example.com',
                'password' => "password",
                'introduction' => "hello Im alonzo",
                'birth_year' => '1979',
                'native_language' => "Spanish",
            ],
            [
                'id' =>10,
                'name'=>'silva',
                'email' => 'silva@example.com',
                'password' => "password",
                'introduction' => "hello Im silva",
                'birth_year' => '1994',
                'native_language' => "Spanish",
            ],
            [
                'id' =>11,
                'name'=>'arnold',
                'email' => 'arnold@example.com',
                'password' => "password",
                'introduction' => "hello Im arnold",
                'birth_year' => '1998',
                'native_language' => "English",
            ],
            [
                'id' =>12,
                'name'=>'daniel',
                'email' => 'daniel@example.com',
                'password' => "password",
                'introduction' => "hello Im daniel",
                'birth_year' => '1989',
                'native_language' => "English",
            ],
            [
                'id' =>13,
                'name'=>'taro',
                'email' => 'taro@example.com',
                'password' => "password",
                'introduction' => "hello Im taro",
                'birth_year' => '1999',
                'native_language' => "Japanese",
            ],
            [
                'id' =>14,
                'name'=>'kane',
                'email' => 'kane@example.com',
                'password' => "password",
                'introduction' => "hello Im kane",
                'birth_year' => '1995',
                'native_language' => "English",
            ],
            [
                'id' =>15,
                'name'=>'bale',
                'email' => 'bale@example.com',
                'password' => "password",
                'introduction' => "hello Im bale",
                'birth_year' => '1989',
                'native_language' => "English",
            ],
            [
                'id' =>16,
                'name'=>'allison',
                'email' => 'allison@example.com',
                'password' => "password",
                'introduction' => "hello Im allison",
                'birth_year' => '1989',
                'native_language' => "Portuguese",
            ],
            [
                'id' =>17,
                'name'=>'keita',
                'email' => 'keita@example.com',
                'password' => "password",
                'introduction' => "hello Im keita",
                'birth_year' => '1969',
                'native_language' => "Japanese",
            ],
            [
                'id' =>18,
                'name'=>'mane',
                'email' => 'mane@example.com',
                'password' => "password",
                'introduction' => "hello Im mane",
                'birth_year' => '1989',
                'native_language' => "French",
            ],
            [
                'id' =>19,
                'name'=>'Jota',
                'email' => 'Jota@example.com',
                'password' => "password",
                'introduction' => "hello Im Jota",
                'birth_year' => '1989',
                'native_language' => "Portuguese",
            ],
            [
                'id' =>20,
                'name'=>'gea',
                'email' => 'gea@example.com',
                'password' => "password",
                'introduction' => "hello Im gea",
                'birth_year' => '1989',
                'native_language' => "Sapnish",
            ],
            [
                'id' =>21,
                'name'=>'walker',
                'email' => 'walker@example.com',
                'password' => "password",
                'introduction' => "hello Im walker",
                'birth_year' => '1989',
                'native_language' => "English",
            ],
            [
                'id' =>22,
                'name'=>'wan',
                'email' => 'wan@example.com',
                'password' => "password",
                'introduction' => "hello Im wan",
                'birth_year' => '1989',
                'native_language' => "Chinese",
            ],
            
        ];

        foreach ($dataSet as $data) {
            Member::create($data);
        }
    }
}
