<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1,'adminLogin1','adminLogin1','管理者1','かんりしゃ',1, null],
            [2,'lenderLogin1','lenderLogin1','貸舟業者1','かしぶね',2, null],
            [3,'lenderLogin2','lenderLogin2','貸舟業者2','かしぶね',2, null],
            [4,'lenderLogin3','lenderLogin3','貸舟業者3','かしぶね',2, '2021:10:01'],
            [5,'lenderLogin4','lenderLogin4','貸舟業者4','かしぶね',2, '2021:10:01'],
            [6,'lenderLogin5','lenderLogin5','貸舟業者5','かしぶね',2, null],
            [7,'lenderLogin6','lenderLogin6','貸舟業者6','かしぶね',2, null],
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
                    'deleted_at' => $record[6],
                ]);
            }
        }
    }
}
