<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exists = DB::table('member_types')->where('id', 1)->exists();

        if (!$exists) {
            $id = 0;
            $cityId = 0;
            for ($prefecture=1; $prefecture <=10; $prefecture++) {
                for ($city=1; $city<=2; $city++) {
                    $cityId = $cityId + 1;
                    for ($port=1; $port<=2; $port++) {
                        $id = $id +1;
                        DB::table('ports')->insert([
                            'id' => intval($id),
                            'city_id' => $cityId,
                            'port_name' => "港_{$id}",
                            'port_name_kana' => "みなと",
                            'comment' => "港_{$id}_コメント",
                            'created_user_id' => 1,
                            'updated_user_id' => 1,
                            'created_at' => '2022-04-01 00:00:00',
                            'updated_at' => '2022-04-01 00:00:00',
                        ]);
                    }
                }
            }
        }
    }
}
