<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($id=1; $id <=6; $id++) {
            DB::table('boats')->insert([
                'id' => intval($id),
                'lender_id' => $id,
                'boat_name' => "船名_$id",
                'boat_name_kana' => "船名(かな)_$id",
                'fishing_area' => "対応エリア_$id",
                'capacity' => $id,
                'departure' => "出航時間_$id",
                'fishing_point' => "釣り座_$id",
                'tackle' => "貸タックル_$id",
                'length' => $id,
                'weight' => $id,
                'caption_comment' => "船長コメント_$id",
                'boat_img_1' => "https://www.hankyu-travel.com/attending/cruise/images/nipponmaru/charm_SP19-128433D.jpg",
                'created_user_id' => 1,
                'updated_user_id' => 1,
                'created_at' => '2022-04-01 00:00:00',
                'updated_at' => '2022-04-01 00:00:00',
            ]);
        }
    }
}
