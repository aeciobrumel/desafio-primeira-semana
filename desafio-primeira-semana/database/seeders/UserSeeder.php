<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Enums\PermissionLevel;

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
                    'permission_level' => PermissionLevel::ADMIN,
                ],
                [
                    'name' => 'Docente',
                    'email' => 'docente@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level'=> PermissionLevel::DOCENTE,
                ],
                [
                    'name' => 'Aluno',
                    'email' => 'aluno@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level'=> PermissionLevel::ALUNO,
                ],
                [
                    'name' => 'teste',
                    'email' => 'teste@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level' => PermissionLevel::ADMIN,
                ],
                [
                    'name' => 'teste2',
                    'email' => 'teste2@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level' => PermissionLevel::ADMIN,
                ],
                [
                    'name' => 'teste3',
                    'email' => 'teste3@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level' => PermissionLevel::ADMIN,
                ],
                [
                    'name' => 'teste4',
                    'email' => 'teste4@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level' => PermissionLevel::ADMIN,
                ],
                [
                    'name' => 'teste5',
                    'email' => 'teste5@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level' => PermissionLevel::ADMIN,
                ],
            ]
        ); 
    }
}
