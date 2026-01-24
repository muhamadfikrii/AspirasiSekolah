<?php

namespace App\Enums;

enum AspirationStatus: string
{
    case MENUNGGU = 'menunggu';
    case PROSES   = 'proses';
    case SELESAI  = 'selesai';

    // optional: label buat tampilan
    public function label(): string
    {
        return match ($this) {
            self::MENUNGGU => 'Menunggu',
            self::PROSES   => 'Proses',
            self::SELESAI  => 'Selesai',
        };
    }
}
