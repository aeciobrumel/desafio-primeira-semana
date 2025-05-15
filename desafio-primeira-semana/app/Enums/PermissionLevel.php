<?php

namespace App\Enums;

enum PermissionLevel:int
{
    case ADMIN = 1;
    case DOCENTE = 2;
    case ALUNO = 3;
}
