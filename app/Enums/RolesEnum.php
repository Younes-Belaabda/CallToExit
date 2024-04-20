<?php

    namespace App\Enums;

    use Spatie\Enum\Enum;

    enum RolesEnum: string {
        case ADMIN = 'admin';
        case STAFF = 'staff';
        case STUDENT = 'student';
        case FATHER = 'father';

        public function label(): string
        {
            return match ($this) {
                static::ADMIN => 'AD',
                static::STAFF => 'ST',
                static::STUDENT => 'S',
                static::FATHER => 'F',
            };
        }
    }

