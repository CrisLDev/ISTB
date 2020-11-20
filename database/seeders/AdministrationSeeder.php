<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Administration;

class AdministrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administration::create([
            'id' => 1,
            'fullname' => 'Alfredo Manuel Bautista Encina',
            'user_id' => 1,
            'telephoneNumber' => 0985621452,
            'dni' => 1203652145,
            'address' => 'km 20 via a la costa',
            'age' => '20',
            'email' => 'leonardomoreirapazmio@gmail.com',
            'code' => rand(),
            'birthDate' => '2020-11-20',
            'role' => 'Director'
        ]);
        Administration::create([
            'id' => 2,
            'fullname' => 'Alejandro Bautista Mejía',
            'user_id' => 1,
            'telephoneNumber' => 0145232789,
            'dni' => 1103652145,
            'address' => 'Av de las americas',
            'age' => '23',
            'email' => 'bausmeji@gmail.com',
            'code' => rand(),
            'birthDate' => '2000-11-20',
            'role' => 'Director de talento humano'
        ]);
        Administration::create([
            'id' => 3,
            'fullname' => 'Juan Miguel de Jesús Bautista Vázquez',
            'user_id' => 1,
            'telephoneNumber' => 0932652326,
            'dni' => 1503652145,
            'address' => 'Avenida Francisco de Orellana',
            'age' => '50',
            'email' => 'basuvasq@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20',
            'role' => 'Secretario'
        ]);
        Administration::create([
            'id' => 4,
            'fullname' => 'Gregorio Benítez Ferrusquía',
            'user_id' => 1,
            'telephoneNumber' => 0925262535,
            'dni' => 1103652145,
            'address' => 'Avenida Malecón Simón Bolívar',
            'age' => '70',
            'email' => 'beisferru@gmail.com',
            'code' => rand(),
            'birthDate' => '1930-11-20',
            'role' => 'Transportista'
        ]);
        Administration::create([
            'id' => 5,
            'fullname' => 'José Bermúdez Manrique',
            'user_id' => 1,
            'telephoneNumber' => 0965986593,
            'dni' => 1103619145,
            'address' => 'Avenida Malecón Simón Bolívar',
            'age' => '30',
            'email' => 'jbermud@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20',
            'role' => 'Transportista'
        ]);
        Administration::create([
            'id' => 6,
            'fullname' => 'José Bermúdez Manrique',
            'user_id' => 1,
            'telephoneNumber' => 0965986593,
            'dni' => 1103619145,
            'address' => 'Avenida Malecón Simón Bolívar',
            'age' => '30',
            'email' => 'jbermud@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20',
            'role' => 'Transportista'
        ]);
    }
}
