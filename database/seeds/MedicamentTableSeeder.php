<?php

use App\Medicament;
use Illuminate\Database\Seeder;

class MedicamentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Medicament::class, 20)->create();
    }
}
