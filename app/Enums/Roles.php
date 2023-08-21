<?php

namespace App\Enums;

use App\Enums\Attributes\Description;

enum Roles: string
{
    #[Description('Administrator')]
    case SUPER_ADMIN = 'super-admin';

    #[Description('Administrator')]
    case ADMIN = 'admin';

    #[Description('User')]
    case USER = 'user';

    public static function all(): array
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
            self::USER,
        ];
    }
}
