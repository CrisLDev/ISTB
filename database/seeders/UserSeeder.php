<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('159753cris');
        User::create([
            'username' => 'CrisMP2',
            'name' => 'Cristhian Leonardo Moreira Pazmiño',
            'email_verified_at' => null,
            'role' => 'admin',
            'email' => 'leonardomoreirapazmio@gmail.com',
            'password' => $password
        ]);
    }
}
