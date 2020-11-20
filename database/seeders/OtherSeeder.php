<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subject;

use App\Models\Course;

class OtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'id' => '1',
            'subjectName' => 'Desarrollo y aprendizaje'
        ]);
        Subject::create([
            'id' => '2',
            'subjectName' => 'Planeación y evaluación de la enseñanza y el aprendizaje'
        ]);
        Subject::create([
            'id' => '3',
            'subjectName' => 'Teoría Pedagógica'
        ]);
        Subject::create([
            'id' => '4',
            'subjectName' => 'Tecnologías de la Información'
        ]);
        Subject::create([
            'id' => '5',
            'subjectName' => 'Psicología del desarrollo infantil'
        ]);
        Subject::create([
            'id' => '6',
            'subjectName' => 'Acercamiento a las Ciencias Naturales en el Preescolar'
        ]);
        Subject::create([
            'id' => '7',
            'subjectName' => 'Educación Histórica en el aula'
        ]);
        Subject::create([
            'id' => '8',
            'subjectName' => 'Educación Artística (Artes visuales y Teatro)'
        ]);
        Subject::create([
            'id' => '9',
            'subjectName' => 'Política y Legislación educativa mexicana'
        ]);
        Subject::create([
            'id' => '10',
            'subjectName' => 'Creación de ambientes de aprendizaje'
        ]);
        Course::create([
            'id' => '1',
            'courseName' => '1 "A"'
        ]);
        Course::create([
            'id' => '2',
            'courseName' => '2 "A"'
        ]);
        Course::create([
            'id' => '3',
            'courseName' => '3 "A"'
        ]);
        Course::create([
            'id' => '4',
            'courseName' => '4 "A"'
        ]);
        Course::create([
            'id' => '5',
            'courseName' => '5 "A"'
        ]);
    }
}
