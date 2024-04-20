<?php

    namespace App\Enums;

    use Spatie\Enum\Enum;

    enum ExitRequestStatusEnum: string {
        case PROGRESS = 'progress';
        case APPROVED = 'approved';
        case REJECTED = 'rejected';

        public function label(): string
        {
            return match ($this) {
                static::PROGRESS => 'PRG',
                static::APPROVED => 'APPR',
                static::REJECTED => 'REJ',
            };
        }
    }
