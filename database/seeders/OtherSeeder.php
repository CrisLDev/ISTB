<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Activity;

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
        Activity::create([
            'id' => '1',
            'activityName' => 'Desarrollo y aprendizaje'
        ]);
        Activity::create([
            'id' => '2',
            'activityName' => 'Planeación y evaluación de la enseñanza y el aprendizaje'
        ]);
        Activity::create([
            'id' => '3',
            'activityName' => 'Teoría Pedagógica'
        ]);
        Activity::create([
            'id' => '4',
            'activityName' => 'Tecnologías de la Información'
        ]);
        Activity::create([
            'id' => '5',
            'activityName' => 'Psicología del desarrollo infantil'
        ]);
        Activity::create([
            'id' => '6',
            'activityName' => 'Acercamiento a las Ciencias Naturales en el Preescolar'
        ]);
        Activity::create([
            'id' => '7',
            'activityName' => 'Educación Histórica en el aula'
        ]);
        Activity::create([
            'id' => '8',
            'activityName' => 'Educación Artística (Artes visuales y Teatro)'
        ]);
        Activity::create([
            'id' => '9',
            'activityName' => 'Política y Legislación educativa mexicana'
        ]);
        Activity::create([
            'id' => '10',
            'activityName' => 'Creación de ambientes de aprendizaje'
        ]);
        Course::create([
            'id' => '1',
            'courseName' => 'Mis pequeños angelitos',
            'ageRange' => '2',
            'startDate' => '07:44',
            'endDate' => '07:44'
        ]);
        Course::create([
            'id' => '2',
            'courseName' => 'Girasoles',
            'ageRange' => '3',
            'startDate' => '07:44',
            'endDate' => '07:44'
        ]);
        Course::create([
            'id' => '3',
            'courseName' => 'Pequeños Traviesos',
            'ageRange' => '1',
            'startDate' => '07:44',
            'endDate' => '22:07'
        ]);
    }
}
