<?php

namespace App\Enums;

enum BestelMethode : string
{
    case afhalen = 'afhalen';
    case bezorging = 'bezorging';

    public static function getValues(): array
    {
        return array_column(BestelMethode::cases(), 'value');
    }
}
