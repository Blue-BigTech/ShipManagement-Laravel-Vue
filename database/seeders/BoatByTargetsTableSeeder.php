<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoatByTargetsTableSeeder extends Seeder
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
            for ($targetId=1; $targetId <=10; $targetId++) {
                for ($season=1; $season<=4; $season++) {
                    $id = $id + 1;
                    $exists = DB::table('boat_by_targets')->where('id', $id)->exists();
                    if (!$exists) {
                        DB::table('boat_by_targets')->insert([
                        'id' => intval($id),
                        'boat_id' => $boatId,
                        'target_id' => $targetId,
                        'season_id' => $season,
                        'created_at' => '2022-04-01 00:00:00',
                        'updated_at' => '2022-04-01 00:00:00',
                    ]);
                    }
                }
            }
        }
    }
}
