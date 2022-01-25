<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\articulo;
use App\Models\autores;
use App\Models\User;
use App\Models\tipo_art;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(15)->create();
        articulo::factory(20)->create();
        autores::factory(10)->create();
        
        $tipo_art = new tipo_art();
        $tipo_art2 = new tipo_art();
        $tipo_art3 = new tipo_art();
        $tipo_art4 = new tipo_art();

        $tipo_art->nombre = 'JRC';
        $tipo_art2->nombre = 'SCIMAGO';
        $tipo_art3->nombre = 'Indice Scopus';
        $tipo_art4->nombre = 'Conacyt';
        
        $tipo_art->save();
        $tipo_art2->save();
        $tipo_art3->save();
        $tipo_art4->save();

 
        //admin
        $admin = new User();
        $admin->nombre='admin';
        $admin->email='admin@admin.com';
        $admin->password='admin';
        $admin->tipo_usuario='1';
        $admin->ap_paterno=$this->faker->lastName();
        $admin->ap_materno=$this->faker->lastName();
        $admin->fecha_nac=$this->faker->unixTime($max = 'now');
        $admin->calle=$this->faker->streetName();
        $admin->colonia=$this->faker->streetName();
        $admin->cp=$this->faker->postcode();
        $admin->ciudad=$this->faker->city();
        $admin->estado=$this->faker->state();
        $admin->telefono=$this->faker->tollFreePhoneNumber();
        $admin->grado_estudios=$this->faker->randomElement(['Licenciatura','Maestria','Doctorado']);

        $admin->save();

    }
}
