<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Assistance;

class AssistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Assistance::create([
        'id' => '1',
        'day' => '2015-12-15',
        'justification' => 'El vato no jue',
        'student_id' => '1',
    ]);
    Assistance::create([
        'id' => '2',
        'day' => '2015-12-15',
        'justification' => 'El vato no jue',
        'student_id' => '2',
    ]);
    Assistance::create([
        'id' => '3',
        'day' => '2015-12-15',
        'justification' => 'El vato no jue',
        'student_id' => '3',
    ]);
    Assistance::create([
        'id' => '4',
        'day' => '2015-12-15',
        'justification' => 'El vato no jue',
        'student_id' => '4',
    ]);
    Assistance::create([
        'id' => '5',
        'day' => '2015-12-15',
        'justification' => 'El vato no jue',
        'student_id' => '5',
    ]);
    Assistance::create([
        'id' => '6',
        'day' => '2015-12-15',
        'justification' => 'El vato no jue',
        'student_id' => '6',
    ]);
    }
}
