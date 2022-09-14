<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FishingOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1,'胴突き'],
            [2,'コマセ(撒き餌)'],
            [3,'ひとつテンヤ'],
            [4,'タイラバ'],
            [5,'ジギング'],
            [6,'キャスティング'],
            [7,'スロージギング'],
            [8,'エギング＆テンヤ'],
            [9,'イカヅノ＆スッテ'],
            [10,'落とし込み釣り'],
            [11,'泳がせ釣り'],
            [12,'天びん'],
            [13,'五目釣り'],
            [14,'イカダ・カセ釣り'],
            [15,'船サビキ'],
        ];

        foreach ($records as $record) {
            $id = $record[0];
            $exists = DB::table('fishing_options')->where('id', $id)->exists();

            if (!$exists) {
                DB::table('fishing_options')->insert([
                    'id' => $id,
                    'fishing_option_name' => $record[1],
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => '2022-04-01 00:00:00',
                    'updated_at' => '2022-04-01 00:00:00',
                ]);
            }
        }
    }
}
