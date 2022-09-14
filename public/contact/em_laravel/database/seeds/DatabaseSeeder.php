<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call( FormBlocksTableSeeder::class );
        $this->call( UserTableSeeder::class );
        $this->call( ChoicesTableSeeder::class );
        $this->call( FormsTableSeeder::class );
        $this->call( FormItemsTableSeeder::class );
    }
}
