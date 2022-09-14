<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        /*-------------------------------------------*/
        /* 本番環境
        /*-------------------------------------------*/
        // masterData
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeederForProd::class); // 本番環境
        $this->call(OperationsTableSeeder::class);
        $this->call(TargetsTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(PrefecturesTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(FishingOptionsTableSeeder::class);
        $this->call(MemberTypesTableSeeder::class);
        $this->call(PaymentOptionsTableSeeder::class);

        // /*-------------------------------------------*/
        // /* ローカル環境
        // /*-------------------------------------------*/
        // // masterData
        // $this->call(RolesTableSeeder::class);
        // $this->call(UsersTestTableSeeder::class); // ローカル環境
        // $this->call(OperationsTableSeeder::class);
        // $this->call(TargetsTableSeeder::class);
        // $this->call(RegionsTableSeeder::class);
        // $this->call(PrefecturesTableSeeder::class);
        // $this->call(CitiesTableSeeder::class);
        // $this->call(PortsTableSeeder::class);
        // $this->call(FacilitiesTableSeeder::class);
        // $this->call(FishingOptionsTableSeeder::class);
        // $this->call(MemberTypesTableSeeder::class);
        // $this->call(PaymentOptionsTableSeeder::class);

        // // Dummy
        // $this->call(LendersTableSeeder::class);
        // $this->call(BoatsTableSeeder::class);
        // $this->call(BoatByFacilitiesTableSeeder::class);
        // $this->call(BoatByFishingOptionsTableSeeder::class);
        // $this->call(BoatByOperationsTableSeeder::class);
        // $this->call(BoatByTargetsTableSeeder::class);
        // $this->call(LenderByPaymentOptionsTableSeeder::class);
        // $this->call(LenderPostsTableSeeder::class);
        // $this->call(LenderPostByFishingOptionsTableSeeder::class);
        // $this->call(LenderPostByTargetsTableSeeder::class);
        // /*-------------------------------------------*/
        // $this->call(sTableSeeder::class);
        // $this->call(sTableSeeder::class);
        // $this->call(sTableSeeder::class);
        // $this->call(sTableSeeder::class);
    }
}
