<?php
namespace App\Enum;

enum UserRoleEnum: string {
    case ADMIN = "ADMIN";
    case USER = "USER";
    case KASIR = "KASIR";

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
