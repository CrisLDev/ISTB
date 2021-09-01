<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Reports;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reports::create([
            'id' => '1',
            'resume' => 'Clase de desarrollo',
            'user_id' => '1',
            'course_id' => '1',
            'student_id' => '1',
            'teacher_id' => '1',
            'content' => 'Dutante la clase de desarrollo del aprendizaje se realizaron todas las actividades que ser tenian prebvistas sin problemas al parecder todo bien'
        ]);
        Reports::create([
            'id' => '2',
            'resume' => 'Clase de psicologia',
            'user_id' => '1',
            'course_id' => '1',
            'student_id' => '2',
            'teacher_id' => '1',
            'content' => 'Dutante la clase de psicologia se pudo notas lo comprometido del estudiante'
        ]);
        Reports::create([
            'id' => '3',
            'resume' => 'Problema en clase de educacion historica',
            'user_id' => '1',
            'course_id' => '2',
            'student_id' => '2',
            'teacher_id' => '9',
            'content' => 'Se observo que el estudiante tiene problemas pra amantenerse concnetrado en cuanto a la clase'
        ]);
        Reports::create([
            'id' => '4',
            'resume' => 'Realizacoin del proyectyos para Desarrollo y aprendizaje',
            'user_id' => '1',
            'course_id' => '1',
            'student_id' => '3',
            'teacher_id' => '8',
            'content' => 'Se Realizaron todos los proyectos sin problema el estudainte no tiene problema con las actividades que se realizan'
        ]);
        Reports::create([
            'id' => '5',
            'resume' => 'Clase de teoria pedagogica',
            'user_id' => '1',
            'course_id' => '2',
            'student_id' => '5',
            'teacher_id' => '4',
            'content' => 'Dutante la clase de psicologia se pudo notas lo comprometido del estudiante'
        ]);
        Reports::create([
            'id' => '6',
            'resume' => 'Creación de ambientes de aprendizaje',
            'user_id' => '1',
            'course_id' => '3',
            'student_id' => '6',
            'teacher_id' => '2',
            'content' => 'Se le enseño al estudiante a mantener el orden en el salon de clases'
        ]);
        Reports::create([
            'id' => '7',
            'resume' => 'Clase de Educación Artística',
            'user_id' => '1',
            'course_id' => '3',
            'student_id' => '8',
            'teacher_id' => '1',
            'content' => 'Se observo que el estudiante tiene problemas para mantener el ritmo de la clase'
        ]);
    }
}
