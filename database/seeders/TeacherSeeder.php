<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'id' => '1',
            'fullname' => 'Alfredo Manuel Bautista Encina',
            'user_id' => '1',
            'telephoneNumber' => '0985621452',
            'dni' => '1203652145',
            'address' => 'km 20 via a la costa',
            'age' => '20',
            'email' => 'leonardomoreirapazmio@gmail.com',
            'code' => rand(),
            'birthDate' => '2020-11-20'
        ]);
        Teacher::create([
            'id' => '2',
            'fullname' => 'Alejandro Bautista Mejía',
            'user_id' => '1',
            'telephoneNumber' => '0145232789',
            'dni' => '1103652145',
            'address' => 'Av de las americas',
            'age' => '23',
            'email' => 'bausmeji@gmail.com',
            'code' => rand(),
            'birthDate' => '2000-11-20'
        ]);
        Teacher::create([
            'id' => '3',
            'fullname' => 'Juan Miguel de Jesús Bautista Vázquez',
            'user_id' => '1',
            'telephoneNumber' => '0932652326',
            'dni' => '1503652145',
            'address' => 'Avenida Francisco de Orellana',
            'age' => '50',
            'email' => 'basuvasq@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20'
        ]);
        Teacher::create([
            'id' => '4',
            'fullname' => 'Gregorio Benítez Ferrusquía',
            'user_id' => '1',
            'telephoneNumber' => '0925262535',
            'dni' => '1103652145',
            'address' => 'Avenida Malecón Simón Bolívar',
            'age' => '70',
            'email' => 'beisferru@gmail.com',
            'code' => rand(),
            'birthDate' => '1930-11-20'
        ]);
        Teacher::create([
            'id' => '5',
            'fullname' => 'José Bermúdez Manrique',
            'user_id' => '1',
            'telephoneNumber' => '0965986593',
            'dni' => '1103619145',
            'address' => 'Avenida Malecón Simón Bolívar',
            'age' => '30',
            'email' => 'jbermud@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20'
        ]);
        Teacher::create([
            'id' => '6',
            'fullname' => 'Salvador de la Cruz Hernandez',
            'user_id' => '1',
            'telephoneNumber' => '0945986593',
            'dni' => '1000619145',
            'address' => 'Calle florez',
            'age' => '30',
            'email' => 'sdlchernnandez@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20'
        ]);
        Teacher::create([
            'id' => '7',
            'fullname' => 'Gigliola Valencia Murillo',
            'user_id' => '1',
            'telephoneNumber' => '0943186593',
            'dni' => '1111619145',
            'address' => 'Calle Olmedo',
            'age' => '30',
            'email' => 'gigliolamurillo123@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20'
        ]);
        Teacher::create([
            'id' => '8',
            'fullname' => 'Miguel Valencia Murillo',
            'user_id' => '1',
            'telephoneNumber' => '0943125593',
            'dni' => 1111259145,
            'address' => 'Calle Olmedo',
            'age' => '40',
            'email' => 'miguelamurillo123@gmail.com',
            'code' => rand(),
            'birthDate' => '1980-12-20'
        ]);
        Teacher::create([
            'id' => '9',
            'fullname' => 'Anacleto Valencia Murillo',
            'user_id' => '1',
            'telephoneNumber' => '0943186593',
            'dni' => '1111619145',
            'address' => 'Calle Olmedo',
            'age' => '50',
            'email' => 'aaaaaaaanacleto@gmail.com',
            'code' => rand(),
            'birthDate' => '1970-05-20'
        ]);
        Teacher::create([
            'id' => '10',
            'fullname' => 'Andres Coello Goyes',
            'user_id' => '1',
            'telephoneNumber' => '0965129865',
            'dni' => '1391619145',
            'address' => 'Calle Junin frente av olmedo',
            'age' => '60',
            'email' => 'aaaaaaaanacleto@gmail.com',
            'code' => rand(),
            'birthDate' => '1960-10-12'
        ]);
    }
}
