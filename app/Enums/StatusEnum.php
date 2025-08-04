<?php

namespace App\Enums;

enum StatusEnum: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case FAILED = 'failed';

    public static function toArray(): array
    {
        return array_column(StatusEnum::cases(), 'value');
    }
}
