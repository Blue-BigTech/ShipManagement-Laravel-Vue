<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 0;
        for ($userId=2; $userId <=7; $userId++) {
            $id = $id+1;

            $exists = DB::table('lenders')->where('id', $id)->exists();
            if (!$exists) {
                DB::table('lenders')->insert([
                    'id' => intval($id),
                    'user_id' => $userId,
                    'member_type_id' => 1,
                    'zip_code' => "555-5555",
                    'prefecture_id' => 1,
                    'city_id' => 1,
                    'address' => "所番地_$id",
                    'port_id' => 1,
                    'map_url' => "https://_$id",
                    'access_example' => "アクセス説明_$id",
                    'phone' => "080-1111-2222",
                    'hp_url' => "https://_$id",
                    'price' => "料金_$id",
                    'parking' => "駐車場_$id",
                    'permission_img' => "https://previews.123rf.com/images/ylivdesign/ylivdesign1705/ylivdesign170501878/77476799-%E3%83%B4%E3%82%A3%E3%83%B3%E3%83%86%E3%83%BC%E3%82%B8%E4%B8%A6%E3%82%93%E3%81%A7%E6%9B%B8%E9%A1%9E%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B3%E3%81%AE%E6%A6%82%E8%A6%81.jpg",
                    'boat_number' => 3,
                    'other' => "備考_$id",
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => '2022-04-01 00:00:00',
                    'updated_at' => '2022-04-01 00:00:00',
                    'deleted_at' => $userId === 4 || $userId === 5 ? '2022-04-01 00:00:00' : null,
                ]);
            }
        }
    }
}
