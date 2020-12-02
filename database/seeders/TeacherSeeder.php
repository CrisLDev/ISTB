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
            'birthDate' => '2020-11-20',
            'startDate' => '07:07',
            'endDate' => '22:07'
        ]);
        Teacher::create([
            'id' => '2',
            'fullname' => 'Daniel Gutierres Mejía',
            'user_id' => '1',
            'telephoneNumber' => '0963532789',
            'dni' => '1002952145',
            'address' => 'Av de las americas',
            'age' => '23',
            'email' => 'danimejia@gmail.com',
            'code' => rand(),
            'birthDate' => '2000-11-20',
            'startDate' => '07:07',
            'endDate' => '22:07'
        ]);
        Teacher::create([
            'id' => '3',
            'fullname' => 'Juan Miguel de Jesús Bautista Vázquez',
            'user_id' => '1',
            'telephoneNumber' => '0996652326',
            'dni' => '1559652145',
            'address' => 'Avenida Quito',
            'age' => '50',
            'email' => 'jmiguekss@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20',
            'startDate' => '07:07',
            'endDate' => '22:07'
        ]);
        Teacher::create([
            'id' => '4',
            'fullname' => 'Orrala Paladinez Ferrusquía',
            'user_id' => '1',
            'telephoneNumber' => '0935662535',
            'dni' => '1104652145',
            'address' => 'Avenida Machala',
            'age' => '70',
            'email' => 'orpaladin@gmail.com',
            'code' => rand(),
            'birthDate' => '1930-11-20',
            'startDate' => '07:07',
            'endDate' => '22:07'
        ]);
        Teacher::create([
            'id' => '5',
            'fullname' => 'Anibal Manrique Junin',
            'user_id' => '1',
            'telephoneNumber' => '0939886593',
            'dni' => '1256619145',
            'address' => 'Avenida Malecón Simón Bolívar',
            'age' => '30',
            'email' => 'amanriquez2000@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20',
            'startDate' => '07:07',
            'endDate' => '22:07'
        ]);
        Teacher::create([
            'id' => '6',
            'fullname' => 'Silvia de la Cruz Hernandez',
            'user_id' => '1',
            'telephoneNumber' => '0903986593',
            'dni' => '1950699145',
            'address' => 'Calle florez y av 10 de octubre',
            'age' => '30',
            'email' => 'silvidelcruz@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20',
            'startDate' => '07:07',
            'endDate' => '22:07'
        ]);
        Teacher::create([
            'id' => '7',
            'fullname' => 'Cristhina Fernanda Valencia Murillo',
            'user_id' => '1',
            'telephoneNumber' => '0951186593',
            'dni' => '1113919145',
            'address' => 'Av macvhana y gomez rendon',
            'age' => '30',
            'email' => 'fcrisshawfbed@gmail.com',
            'code' => rand(),
            'birthDate' => '1990-11-20',
            'startDate' => '07:07',
            'endDate' => '22:07'
        ]);
        Teacher::create([
            'id' => '8',
            'fullname' => 'Miguel Jose Murillo De los Angeles',
            'user_id' => '1',
            'telephoneNumber' => '0915125593',
            'dni' => '1625259125',
            'address' => 'Calle quito y goimez rendon',
            'age' => '40',
            'email' => 'miguela65de@gmail.com',
            'code' => rand(),
            'birthDate' => '1980-12-20',
            'startDate' => '07:07',
            'endDate' => '22:07'
        ]);
        Teacher::create([
            'id' => '9',
            'fullname' => 'Jonathan Vera Murillo',
            'user_id' => '1',
            'telephoneNumber' => '0996699669',
            'dni' => '1253652748',
            'address' => 'Calle Custodio Sanchez',
            'age' => '50',
            'email' => 'veramurrrrislo@gmail.com',
            'code' => rand(),
            'birthDate' => '1970-05-20',
            'startDate' => '07:07',
            'endDate' => '22:07'
        ]);
        Teacher::create([
            'id' => '10',
            'fullname' => 'Juan carlos Coello Chave',
            'user_id' => '1',
            'telephoneNumber' => '0945162986',
            'dni' => '1991619145',
            'address' => 'Calle olmedo frente av machala',
            'age' => '60',
            'email' => 'jcarlosco@gmail.com',
            'code' => rand(),
            'birthDate' => '1960-10-12',
            'startDate' => '07:07',
            'endDate' => '22:07'
        ]);
    }
}
