<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoatByOperationsTableSeeder extends Seeder
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
            for ($operationId=1; $operationId <=3; $operationId++) {
                $id = $id + 1;

                $exists = DB::table('boat_by_operations')->where('id', $id)->exists();
                if (!$exists) {
                    DB::table('boat_by_operations')->insert([
                        'id' => intval($id),
                        'boat_id' => $boatId,
                        'operation_id' => $operationId,
                        'created_at' => '2022-04-01 00:00:00',
                        'updated_at' => '2022-04-01 00:00:00',
                    ]);
                }
            }
        }
    }
}
