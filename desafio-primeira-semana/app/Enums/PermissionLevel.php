<?php

namespace App\Enums;

enum PermissionLevel:int
{
    case ADMIN = 1;
    case DOCENTE = 2;
    case ALUNO = 3;


    public static function fromName(string $name){
        return match ($name) {
            'ADMIN' => self::ADMIN,
            'MODERADOR'=> self::DOCENTE ,
            'ALUNO'=> self::Aluno,
            default => null,
        };
    }
}
