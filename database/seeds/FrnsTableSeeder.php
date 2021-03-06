<?php

use App\Fournisseur;
use Illuminate\Database\Seeder;

class FrnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Fournisseur::class, 20)->create();
    }
}
