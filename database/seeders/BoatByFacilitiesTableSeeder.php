<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoatByFacilitiesTableSeeder extends Seeder
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
            for ($facilityId=1; $facilityId <=3; $facilityId++) {
                $id = $id + 1;

                $exists = DB::table('boat_by_facilities')->where('id', $id)->exists();
                if (!$exists) {
                    DB::table('boat_by_facilities')->insert([
                        'id' => intval($id),
                        'boat_id' => $boatId,
                        'facility_id' => $facilityId,
                        'created_at' => '2022-04-01 00:00:00',
                        'updated_at' => '2022-04-01 00:00:00',
                    ]);
                }
            }
        }
    }
}
