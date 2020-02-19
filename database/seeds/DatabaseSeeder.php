<?php

use App\Festival;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function UsersTableSeed() {
        DB::table('users')->delete();
        User::create(array('name' => 'Jorge', 'email' => 'jorge.rgdaw@gmail.com', 'password' => Hash::make('123456789'), 'rol' => 'admin', 'birth' => date(now())));
        User::create(array('name' => 'Prueba', 'email' => 'prueba@gmail.com', 'password' => Hash::make('123456789'), 'rol' => 'basic', 'birth' => date(now())));

    }

    public function FestivalTableSeed() {
        DB::table('festivals')->delete();
        Festival::create(array('name' => 'Tomorrowland', 'description' => 'descripcion de prueba', 'capacity' => '10000', 'allowedAge' => '18', 'date' => date(now()), 'photo' => 'img/tomorrowland.png'));
        Festival::create(array('name' => 'Ultra Music Festival', 'description' => 'descripcion de prueba', 'capacity' => '8000', 'allowedAge' => '18', 'date' => date(now()), 'photo' => 'img/umf.png'));
        Festival::create(array('name' => 'Barcelona Beach Festival', 'description' => 'descripcion de prueba', 'capacity' => '10000', 'allowedAge' => '18', 'date' => date(now()), 'photo' => 'img/barcelonabeachfestival.png'));
        Festival::create(array('name' => 'Granada Sound', 'description' => 'descripcion de prueba', 'capacity' => '8000', 'allowedAge' => '18', 'date' => date(now()), 'photo' => 'img/granadasound.png'));
    }

    public function run()
    {
        $this->UsersTableSeed();
        $this->FestivalTableSeed();
    }
}
