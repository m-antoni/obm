<?php

use Illuminate\Database\Seeder;

class CreditsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Credit::class, 50)->create();
    }
}
