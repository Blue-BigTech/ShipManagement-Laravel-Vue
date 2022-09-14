<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records =[
            [1,'トイレ','/images/boatDetail/icon_toilet.svg'],
            [2,'キャビン','/images/boatDetail/icon_cabin.svg'],
            [3,'イケス','/images/boatDetail/icon_preserve.svg'],
            [4,'電子レンジ','/images/boatDetail/icon_microwave_oven.svg'],
            [5,'ポット','/images/boatDetail/icon_pot.svg'],
            [6,'電源12V','/images/boatDetail/icon_power12.svg'],
            [7,'電源24V','/images/boatDetail/icon_power24.svg'],
            [8,'電源100V','/images/boatDetail/icon_power100.svg'],
        ];

        foreach ($records as $record) {
            $id = $record[0];
            $exists = DB::table('facilities')->where('id', $id)->exists();

            if (!$exists) {
                DB::table('facilities')->insert([
                    'id' => $id,
                    'facility_name' => $record[1],
                    'icon_img' => $record[2],
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => '2022-04-01 00:00:00',
                    'updated_at' => '2022-04-01 00:00:00',
                ]);
            }
        }

        // for ($id=1; $id<=10; $id++) {
        //     DB::table('facilities')->insert([
        //         'id' => intval($id),
        //         'facility_name' => "船設備_{$id}",
        //         'icon_img' => "image_{$id}",
        //         'created_user_id' => 1,
        //         'updated_user_id' => 1,
        //         'created_at' => '2022-04-01 00:00:00',
        //         'updated_at' => '2022-04-01 00:00:00',
        //     ]);
        // }
    }
}
