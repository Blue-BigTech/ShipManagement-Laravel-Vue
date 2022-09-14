<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1, '乗合'],
            [2, '仕立て(チャーター)'],
            [3, '渡船(瀬渡し,イカダ)'],
        ];

        foreach ($records as $record) {
            $id = $record[0];
            $exists = DB::table('operations')->where('id', $id)->exists();

            if (!$exists) {
                DB::table('operations')->insert([
                    'id' => $id,
                    'operation_name' => $record[1],
                ]);
            }
        }
    }
}
