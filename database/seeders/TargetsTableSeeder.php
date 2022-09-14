<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1,'マダイ'],
            [2,'ブリ'],
            [3,'マアジ'],
            [4,'ヒラメ'],
            [5,'カサゴ'],
            [6,'アマダイ'],
            [7,'マサバ'],
            [8,'カワハギ'],
            [9,'イサキ'],
            [10,'タチウオ'],
            [11,'キダイ'],
            [12,'キハダ'],
            [13,'ヒラマサ'],
            [14,'サワラ'],
            [15,'メバル'],
            [16,'カンパチ'],
            [17,'クロムツ'],
            [18,'キンメダイ'],
            [19,'アコウ'],
            [20,'アカハタ'],
            [21,'クロダイ'],
            [22,'メジナ'],
            [23,'イシダイ'],
            [24,'オオモンハタ'],
            [25,'カツオ'],
            [26,'マゴチ'],
            [27,'スジアラ'],
            [28,'クエ'],
            [29,'ロウニンアジ'],
            [30,'シイラ'],
            [31,'マガレイ'],
            [32,'ヤリイカ'],
            [33,'アオリイカ'],
            [34,'コウイカ'],
            [35,'マダコ'],
        ];
        // $id = 0;
        // for ($count=1; $count<=15; $count++) {
        //     $id = $id +1;
        //     $exists = DB::table('targets')->where('id', $id)->exists();
        //     if (!$exists) {
        //         DB::table('targets')->insert([
        //             'id' => intval($id),
        //             'target_name' => "ターゲットid_{$id}",
        //             'created_user_id' => 1,
        //             'updated_user_id' => 1,
        //             'created_at' => '2022-04-01 00:00:00',
        //             'updated_at' => '2022-04-01 00:00:00',
        //         ]);
        //     }
        // }

        foreach ($records as $record) {
            $id = $record[0];
            $exists = DB::table('targets')->where('id', $id)->exists();

            if (!$exists) {
                DB::table('targets')->insert([
                    'id' => $id,
                    'target_name' => $record[1],
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => '2022-04-01 00:00:00',
                    'updated_at' => '2022-04-01 00:00:00',
                ]);
            }
        }
    }
}
