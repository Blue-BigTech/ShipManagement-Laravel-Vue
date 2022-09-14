<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1, '現金(前払い)'],
            [2, '現金(後払い)'],
            [3, 'VISA'],
            [4, 'MASTER'],
            [5, 'JCB'],
            [6, 'AMEX'],
            [7, 'PayPay'],
            [8, 'QuickPay'],
            [9, 'LINE Pay'],
            [10, 'au PAY'],
            [11, 'd払い'],
        ];

        foreach ($records as $record) {
            $id = $record[0];
            $exists = DB::table('payment_options')->where('id', $id)->exists();

            if (!$exists) {
                DB::table('payment_options')->insert([
                    'id' => $id,
                    'payment_option_name' => $record[1],
                    'created_at' => '2022-04-01 00:00:00',
                    'updated_at' => '2022-04-01 00:00:00',
                ]);
            }
        }
    }
}
