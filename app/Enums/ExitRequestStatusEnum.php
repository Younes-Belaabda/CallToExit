<?php

    namespace App\Enums;

    use Spatie\Enum\Enum;

    final class ExitRequestStatusEnum extends Enum {
        protected static function values() : array{
            return [
                'PROGRESS'   => 'قيد المراجعة',
                'APPROVED'   => 'منتهية',
                'REJECTED'  => 'مرفوضة'
            ];
        }
    }

