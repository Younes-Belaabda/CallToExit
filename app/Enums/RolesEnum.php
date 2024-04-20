<?php

    namespace App\Enums;

    use Spatie\Enum\Enum;

    final class RolesEnum extends Enum {
        protected static function values() : array{
            return [
                'ADMIN'   => 'أدمين',
                'STAFF'   => 'مشرف',
                'FATHER'  => 'ولي الأمر',
                'STUDENT' => 'طالب',
            ];
        }
    }

