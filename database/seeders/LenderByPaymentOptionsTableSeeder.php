<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LenderByPaymentOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 0;
        for ($lenderId=1; $lenderId <=6; $lenderId++) {
            for ($paymentId=1; $paymentId <=3; $paymentId++) {
                $id = $id + 1;

                $exists = DB::table('lender_by_payment_options')->where('id', $id)->exists();
                if (!$exists) {
                    DB::table('lender_by_payment_options')->insert([
                        'id' => intval($id),
                        'lender_id' => $lenderId,
                        'payment_option_id' => $paymentId,
                        'created_at' => '2022-04-01 00:00:00',
                        'updated_at' => '2022-04-01 00:00:00',
                    ]);
                }
            }
        }
    }
}
