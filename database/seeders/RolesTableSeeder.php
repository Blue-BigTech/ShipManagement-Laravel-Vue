<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1, '管理者'],
            [2, '貸舟業者'],
            [3, '閲覧者'],
        ];

        foreach ($records as $record) {
            $id = $record[0];
            $exists = DB::table('roles')->where('id', $id)->exists();

            if (!$exists) {
                DB::table('roles')->insert([
                    'id' => $id,
                    'role_name' => $record[1],
                ]);
            }
        }
    }
}
