<?php

namespace App\Http\Enums;

enum UserType: string
{
    case CUSTOMER = 'customer';

    case ADMIN = 'admin';



    public static function values(): array
    {
        return array_map(fn(UserType $userType) => $userType->value, self::cases());
    }
}
