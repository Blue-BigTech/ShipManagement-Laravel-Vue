<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1,1,'北海道','ほっかいどう','hokkaido'],
            [2,1,'青森県','あおもりけん','aomori'],
            [3,1,'岩手県','いわてけん','iwate'],
            [4,1,'宮城県','みやぎけん','miyagi'],
            [5,1,'秋田県','あきたけん','akita'],
            [6,1,'山形県','やまがたけん','yamagata'],
            [7,1,'福島県','ふくしまけん','fukushima'],
            [8,2,'茨城県','いばらきけん','ibaraki'],
            [9,2,'栃木県','とちぎけん','tochigi'],
            [10,2,'群馬県','ぐんまけん','gunma'],
            [11,2,'埼玉県','さいたまけん','saitama'],
            [12,2,'千葉県','ちばけん','chiba'],
            [13,2,'東京都','とうきょうと','tokyo'],
            [14,2,'神奈川県','かながわけん','kanagawa'],
            [15,3,'新潟県','にいがたけん','niigata'],
            [16,3,'富山県','とやまけん','toyama'],
            [17,3,'石川県','いしかわけん','ishikawa'],
            [18,3,'福井県','ふくいけん','fukui'],
            [19,3,'山梨県','やまなしけん','yamanashi'],
            [20,3,'長野県','ながのけん','nagano'],
            [21,4,'岐阜県','ぎふけん','gifu'],
            [22,4,'静岡県','しずおかけん','shizuoka'],
            [23,4,'愛知県','あいちけん','aichi'],
            [24,4,'三重県','みえけん','mie'],
            [25,5,'滋賀県','しがけん','shiga'],
            [26,5,'京都府','きょうとふ','kyoto'],
            [27,5,'大阪府','おおさかふ','osaka'],
            [28,5,'兵庫県','ひょうごけん','hyogo'],
            [29,5,'奈良県','ならけん','nara'],
            [30,5,'和歌山県','わかやまけん','wakayama'],
            [31,6,'鳥取県','とっとりけん','tottori'],
            [32,6,'岡山県','しまねけん','shimane'],
            [33,6,'広島県','おかやまけん','okayama'],
            [34,6,'島根県','ひろしまけん','hiroshima'],
            [35,6,'山口県','やまぐちけん','yamaguchi'],
            [36,6,'徳島県','とくしまけん','tokushima'],
            [37,6,'香川県','かがわけん','kagawa'],
            [38,6,'高知県','えひめけん','ehime'],
            [39,6,'愛媛県','こうちけん','kochi'],
            [40,7,'福岡県','ふくおかけん','fukuoka'],
            [41,7,'佐賀県','さがけん','saga'],
            [42,7,'長崎県','ながさきけん','nagasaki'],
            [43,7,'大分県','くまもとけん','kumamoto'],
            [44,7,'熊本県','おおいたけん','oita'],
            [45,7,'宮崎県','みやざきけん','miyazaki'],
            [46,7,'鹿児島県','かごしまけん','kagoshima'],
            [47,7,'沖縄県','おきなわけん','okinawa'],
        ];

        foreach ($records as $record) {
            $id = $record[0];
            $exists = DB::table('prefectures')->where('id', $id)->exists();

            if (!$exists) {
                DB::table('prefectures')->insert([
                    'id' => $id,
                    'region_id' => $record[1],
                    'prefecture_name' => $record[2],
                    'prefecture_name_kana' => $record[3],
                    'url_param' => $record[4],
                    'created_user_id' => 1,
                    'updated_user_id' => 1,
                    'created_at' => '2022-04-01 00:00:00',
                    'updated_at' => '2022-04-01 00:00:00',
                ]);
            }
        }
    }
}
