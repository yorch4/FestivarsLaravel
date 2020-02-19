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
        Festival::create(array('name' => 'Tomorrowland', 'description' => 'Tomorrowland es un festival de música electrónica de baile celebrado anualmente en la localidad de Boom (Bélgica). El festival es organizado por ID&T y se calcula que anualmente acuden más de 400.000 personas de casi 200 nacionalidades distintas.1​2​ Es oficialmente el festival más grande del planeta.', 'capacity' => '400000', 'allowedAge' => '18', 'date' => date(now()), 'photo' => 'img/tomorrowland.png'));
        Festival::create(array('name' => 'Ultra Music Festival', 'description' => 'Ultra Music Festival (UMF) es un enorme festival de música electrónica con sede en Miami. Dio inicio en 1999 y toma su nombre de un álbum de Depeche Mode. Hoy por hoy el Ultra Music Festival es uno de los festivales de música más populares en los Estados Unidos.', 'capacity' => '170000', 'allowedAge' => '18', 'date' => date(now()), 'photo' => 'img/umf.png'));
        Festival::create(array('name' => 'Barcelona Beach Festival', 'description' => 'Barcelona Beach Festival es uno de los eventos de música dance más importantes de España, y se celebra cada verano en Platja del Fòrum, Barcelona.', 'capacity' => '70000', 'allowedAge' => '18', 'date' => date(now()), 'photo' => 'img/barcelonabeachfestival.png'));
        Festival::create(array('name' => 'Granada Sound', 'description' => 'Granada Sound es un festival celebrado cada año en septiembre en la Alhambra. Llevan 7 ediciones de continuo crecimiento, y el festival afronta su sexta edición manteniendo su filosofía de música independiente nacional e internacional, con la convivencia de bandas consagradas con grupos emergentes. De esta manera, este festival se ha convertido en uno de los más importantes de Andalucía.', 'capacity' => '25000', 'allowedAge' => '18', 'date' => date(now()), 'photo' => 'img/granadasound.png'));
    }

    public function run()
    {
        $this->UsersTableSeed();
        $this->FestivalTableSeed();
    }
}
