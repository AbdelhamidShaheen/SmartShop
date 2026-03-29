<?php

namespace App\Http\Enums;

enum UserType: string
{
    case CUSTOMER = 'customer';

    case ADMIN = 'admin';
}
