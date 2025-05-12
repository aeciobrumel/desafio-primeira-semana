<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [            

                    'name' => 'Administrador',
                    'email' =>'administrador@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level'=> User::PERMISSION_ADMIN,
                ],
                [
                    'name' => 'Docente',
                    'email' => 'docente@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level'=> User::PERMISSION_DOCENTE,
                ],
                [
                    'name' => 'Aluno',
                    'email' => 'aluno@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level'=> User::PERMISSION_ALUNO,
                ],
                [
                    'name' => 'teste',
                    'email' => 'teste@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level' => User::PERMISSION_ADMIN,
                ],
            ]
        ); 
    }
}
