<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeederForProd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1,'osakanayugyo1','Djj8Ydireg9Hj','遊漁船管理者','かんりしゃ',1],
            [2,'adminLogin1','adminLogin1','開発用ID','かいはつしゃ',1],
        ];

        foreach ($records as $record) {
            $id = $record[0];
            $exists = DB::table('users')->where('id', $id)->exists();

            if (!$exists) {
                DB::table('users')->insert([
                    'id' => $id,
                    'email' => $record[1],
                    'password' => bcrypt($record[2]),
                    'name' => $record[3],
                    'name_kana' => $record[4],
                    'role_id' => $record[5],
                ]);
            }
        }
    }
}
