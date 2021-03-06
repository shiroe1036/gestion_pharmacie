<?php

use App\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Client::create([
        //     'nomClient' => Str::random(10),
        //     'contact' => mt_rand(),
        //     'email' => Str::random(10).'@gmail.com',
        //     'adresse' => Str::random(7)
        // ]);
        factory(Client::class, 10)->create();
    }
}
