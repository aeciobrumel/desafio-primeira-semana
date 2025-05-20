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
            DB::table('users')->insert([
                [
                    'name' => 'teste',
                    'email' => 'teste@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level' => PermissionLevel::ADMIN,
                    'cpf' => '66666666666',
                ],
                [
                    'name' => 'Administrador',
                    'email' => 'administrador@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level' => PermissionLevel::ADMIN,
                    'cpf' => '11111111111',
                ],
                [
                    'name' => 'Docente',
                    'email' => 'docente@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level' => PermissionLevel::DOCENTE,
                    'cpf' => '22222222222',
                ],
                [
                    'name' => 'Aluno',
                    'email' => 'aluno@exemplo.com',
                    'password' => Hash::make('123456'),
                    'permission_level' => PermissionLevel::ALUNO,
                    'cpf' => '333333333333',
                ],
            ]);
    }
}
//php artisan migrate:fresh --seed
//php artisan db:seed --class=UserSeeder