<?php

namespace App\Enum;

enum EnumRole: string
{
    case CLIENTE = 'cliente';
    case RECEPCIONISTA = 'recepcionista';
    case MEDICO = 'medico';
}
