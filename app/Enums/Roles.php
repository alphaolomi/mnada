<?php

namespace App\Enums;

enum Roles: string
{
    case SUPER_ADMIN = 'super-admin';
    case ADMIN = 'admin';
    case USER = 'user';

    public static function all(): array
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
            self::USER,
        ];
    }

    public static function allExceptSuperAdmin(): array
    {
        return [
            self::Admin,
            self::User,
        ];
    }
}
