<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1, '有料会員'],
            [2, '無料会員'],
            [3, '一般非会員'],
        ];

        foreach ($records as $record) {
            $id = $record[0];
            $exists = DB::table('member_types')->where('id', $id)->exists();

            if (!$exists) {
                DB::table('member_types')->insert([
                    'id' => $id,
                    'member_type_name' => $record[1],
                    'created_at' => '2022-04-01 00:00:00',
                    'updated_at' => '2022-04-01 00:00:00',
                ]);
            }
        }
    }
}
