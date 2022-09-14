<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoatByFishingOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 0;
        for ($boatId=1; $boatId <=6; $boatId++) {
            for ($fishingOptionId=1; $fishingOptionId <=3; $fishingOptionId++) {
                $id = $id + 1;

                $exists = DB::table('boat_by_fishing_options')->where('id', $id)->exists();
                if (!$exists) {
                    DB::table('boat_by_fishing_options')->insert([
                        'id' => intval($id),
                        'boat_id' => $boatId,
                        'fishing_option_id' => $fishingOptionId,
                        'created_at' => '2022-04-01 00:00:00',
                        'updated_at' => '2022-04-01 00:00:00',
                    ]);
                }
            }
        }
    }
}
