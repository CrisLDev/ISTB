<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'id' => '1',
            'fullname' => 'Alfredo Manuel Moreira Encina',
            'user_id' => '1',
            'course_id' => '1',
            'telephoneNumber' => '0985621452',
            'dni' => '1203652145',
            'address' => 'km 20 via a la costa',
            'age' => '6',
            'email' => 'leonardomoreirapazmio@gmail.com',
            'code' => rand(),
            'birthDate' => '2015-12-15',
            'fatherName' => 'Juan Frasciso Espinosa de los Monteros',
            'dniFather' => '1203626263',
            'motherName' => 'Ana Paula Murillo Rodrigeus',
            'dniMother' => '1203030303',
            'status' => 'Enfermo'
        ]);
        Student::create([
            'id' => '2',
            'fullname' => 'Daniel Gutierres Mejía',
            'user_id' => '1',
            'course_id' => '1',
            'telephoneNumber' => '0963532789',
            'dni' => '1002952145',
            'address' => 'Av de las americas',
            'age' => '5',
            'email' => 'danimejia@gmail.com',
            'code' => rand(),
            'birthDate' => '2015-12-15',
            'fatherName' => 'Juan Frasciso Espinosa de los Monteros',
            'dniFather' => '1203626263',
            'motherName' => 'Ana Paula Murillo Rodrigeus',
            'dniMother' => '1203030303',
            'status' => 'Enfermo'
        ]);
        Student::create([
            'id' => '3',
            'fullname' => 'Juan Miguel de Jesús Bautista Vázquez',
            'user_id' => '1',
            'course_id' => '1',
            'telephoneNumber' => '0996652326',
            'dni' => '1559652145',
            'address' => 'Avenida Quito',
            'age' => '5',
            'email' => 'jmiguekss@gmail.com',
            'code' => rand(),
            'birthDate' => '2015-07-14',
            'fatherName' => 'Juan Frasciso Espinosa de los Monteros',
            'dniFather' => '1203626263',
            'motherName' => 'Ana Paula Murillo Rodrigeus',
            'dniMother' => '1203030303',
            'status' => 'Enfermo'
        ]);
        Student::create([
            'id' => '4',
            'fullname' => 'Orrala Paladinez Ferrusquía',
            'user_id' => '1',
            'course_id' => '1',
            'telephoneNumber' => '0935662535',
            'dni' => '1104652145',
            'address' => 'Avenida Machala',
            'age' => '6',
            'email' => 'orpaladin@gmail.com',
            'code' => rand(),
            'birthDate' => '2014-12-16',
            'fatherName' => 'Juan Frasciso Espinosa de los Monteros',
            'dniFather' => '1203626263',
            'motherName' => 'Ana Paula Murillo Rodrigeus',
            'dniMother' => '1203030303',
            'status' => 'Enfermo'
        ]);
        Student::create([
            'id' => '5',
            'fullname' => 'Anibal Manrique Junin',
            'user_id' => '1',
            'course_id' => '1',
            'telephoneNumber' => '0939886593',
            'dni' => '1256619145',
            'address' => 'Avenida Malecón Simón Bolívar',
            'age' => '5',
            'email' => 'amanriquez2000@gmail.com',
            'code' => rand(),
            'birthDate' => '2015-05-14',
            'fatherName' => 'Juan Frasciso Espinosa de los Monteros',
            'dniFather' => '1203626263',
            'motherName' => 'Ana Paula Murillo Rodrigeus',
            'dniMother' => '1203030303',
            'status' => 'Enfermo'
        ]);
        Student::create([
            'id' => '6',
            'fullname' => 'Silvia de la Cruz Hernandez',
            'user_id' => '1',
            'course_id' => '1',
            'telephoneNumber' => '0903986593',
            'dni' => '1950699145',
            'address' => 'Calle florez y av 10 de octubre',
            'age' => '5',
            'email' => 'silvidelcruz@gmail.com',
            'code' => rand(),
            'birthDate' => '2015-06-14',
            'fatherName' => 'Juan Frasciso Espinosa de los Monteros',
            'dniFather' => '1203626263',
            'motherName' => 'Ana Paula Murillo Rodrigeus',
            'dniMother' => '1203030303',
            'status' => 'Enfermo'
        ]);
        Student::create([
            'id' => '7',
            'fullname' => 'Cristhina Fernanda Valencia Murillo',
            'user_id' => '1',
            'course_id' => '1',
            'telephoneNumber' => '0951186593',
            'dni' => '1113919145',
            'address' => 'Av macvhana y gomez rendon',
            'age' => '6',
            'email' => 'fcrisshawfbed@gmail.com',
            'code' => rand(),
            'birthDate' => '2014-07-20',
            'fatherName' => 'Juan Frasciso Espinosa de los Monteros',
            'dniFather' => '1203626263',
            'motherName' => 'Ana Paula Murillo Rodrigeus',
            'dniMother' => '1203030303',
            'status' => 'Enfermo'
        ]);
        Student::create([
            'id' => '8',
            'fullname' => 'Miguel Jose Murillo De los Angeles',
            'user_id' => '1',
            'course_id' => '1',
            'telephoneNumber' => '0915125593',
            'dni' => '1625259125',
            'address' => 'Calle quito y goimez rendon',
            'age' => '5',
            'email' => 'miguela65de@gmail.com',
            'code' => rand(),
            'birthDate' => '2015-10-15',
            'fatherName' => 'Juan Frasciso Espinosa de los Monteros',
            'dniFather' => '1203626263',
            'motherName' => 'Ana Paula Murillo Rodrigeus',
            'dniMother' => '1203030303',
            'status' => 'Enfermo'
        ]);
        Student::create([
            'id' => '9',
            'fullname' => 'Jonathan Vera Murillo',
            'user_id' => '1',
            'telephoneNumber' => '0996699669',
            'dni' => '1253652748',
            'address' => 'Calle Custodio Sanchez',
            'age' => '6',
            'course_id' => '1',
            'email' => 'veramurrrrislo@gmail.com',
            'code' => rand(),
            'birthDate' => '2014-05-20',
            'fatherName' => 'Juan Frasciso Espinosa de los Monteros',
            'dniFather' => '1203626263',
            'motherName' => 'Ana Paula Murillo Rodrigeus',
            'dniMother' => '1203030303',
            'status' => 'Enfermo'
        ]);
        Student::create([
            'id' => '10',
            'fullname' => 'Juan carlos Coello Chave',
            'user_id' => '1',
            'course_id' => '1',
            'telephoneNumber' => '0945162986',
            'dni' => '1991619145',
            'address' => 'Calle olmedo frente av machala',
            'age' => '6',
            'email' => 'jcarlosco@gmail.com',
            'code' => rand(),
            'birthDate' => '2014-09-13',
            'fatherName' => 'Juan Frasciso Espinosa de los Monteros',
            'dniFather' => '1203626263',
            'motherName' => 'Ana Paula Murillo Rodrigeus',
            'dniMother' => '1203030303',
            'status' => 'Enfermo'
        ]);
    }
}
