<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Record;

class RecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Record::create([
            'id' => '1',
            'user_id' => '1',
            'course_id' => '1',
            'student_id' => '1',
            'allergies' => 'Polvo',
            'treatment' => 'Se debe tener cuidado con lo indicado en los otros campos',
            'cardiovascular' => 'no',
            'lice' => 'no',
            'asthma' => 'no',
            'malformation' => 'No se observan malfomraciones',
            'glasses' => 'no',
            'observations' => 'Se debe consultar con un profesional mas preparado',
            'date' => '2015-12-15'
        ]);
        Record::create([
            'id' => '2',
            'user_id' => '1',
            'course_id' => '2',
            'student_id' => '2',
            'allergies' => 'Tipos de pintura - polvo',
            'treatment' => 'Se debe tener cuidado y mantener al paciente en un lugar libre sin objetos que pouedan cuasarle problemas',
            'cardiovascular' => 'si',
            'lice' => 'si',
            'asthma' => 'no',
            'malformation' => 'No se observan malfomraciones',
            'glasses' => 'si',
            'observations' => 'Se debe llevar a un lugar mas capacitado',
            'date' => '2015-12-15'
        ]);
        Record::create([
            'id' => '3',
            'user_id' => '1',
            'course_id' => '1',
            'student_id' => '2',
            'allergies' => '',
            'treatment' => 'Se concidera necesario que se realice una evaluacion medica en un lugar mas capacitado',
            'cardiovascular' => 'no',
            'lice' => 'no',
            'asthma' => 'si',
            'malformation' => 'No se observan malfomraciones',
            'glasses' => 'si',
            'observations' => 'No es necesario mayor intervencion',
            'date' => '2015-12-15'
        ]);
        Record::create([
            'id' => '4',
            'user_id' => '1',
            'course_id' => '1',
            'student_id' => '3',
            'allergies' => '',
            'treatment' => 'Con mantener alejado al estudiante es suficiente',
            'cardiovascular' => 'si',
            'lice' => 'no',
            'asthma' => 'si',
            'malformation' => 'Se observa una malformacion en el pie derecho',
            'glasses' => 'no',
            'observations' => '',
            'date' => '2015-12-15'
        ]);
        Record::create([
            'id' => '5',
            'user_id' => '1',
            'course_id' => '3',
            'student_id' => '5',
            'allergies' => 'Polvo',
            'treatment' => 'Se debe dar los medicamentos y mantener tranquyilo al alumno',
            'cardiovascular' => 'no',
            'lice' => 'no',
            'asthma' => 'no',
            'malformation' => 'No se observan malfomraciones',
            'glasses' => 'no',
            'observations' => 'No es necesario mayor intervencion',
            'date' => '2015-12-15'
        ]);
        Record::create([
            'id' => '6',
            'user_id' => '1',
            'course_id' => '3',
            'student_id' => '6',
            'allergies' => 'Flores',
            'treatment' => 'Se debe considerar las actividades a las que puede participar',
            'cardiovascular' => 'si',
            'lice' => 'no',
            'asthma' => 'si',
            'malformation' => 'No se observan malfomraciones',
            'glasses' => 'si',
            'observations' => 'No es necesario mayor intervencion',
            'date' => '2015-12-15'
        ]);
        Record::create([
            'id' => '7',
            'user_id' => '1',
            'course_id' => '2',
            'student_id' => '8',
            'allergies' => '',
            'treatment' => 'Se recomienda mantener alejado al alumno de cualquier lugar que pueda causarle problemas con sus alergias',
            'cardiovascular' => 'si',
            'lice' => 'si',
            'asthma' => 'no',
            'malformation' => 'No se observan malfomraciones',
            'glasses' => 'no',
            'observations' => '',
            'date' => '2015-12-15'
        ]);
    }
}
