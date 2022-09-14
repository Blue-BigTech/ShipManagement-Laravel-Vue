<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1,'北海道・東北'],
            [2,'関東'],
            [3,'北陸・甲信越'],
            [4,'東海'],
            [5,'近畿'],
            [6,'中国・四国'],
            [7,'九州・沖縄'],
        ];

        foreach ($records as $record) {
            $id = $record[0];
            $exists = DB::table('regions')->where('id', $id)->exists();

            if (!$exists) {
                DB::table('regions')->insert([
                    'id' => $id,
                    'region_name' => $record[1],
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => '2022-04-01 00:00:00',
                    'updated_at' => '2022-04-01 00:00:00',
                ]);
            }
        }
    }
}
