<?php

namespace App\Enums;

enum PermissionLevel:int
{
    case Admin = 1;
    case Docente = 2;
    case Aluno = 3;

}
