<?php

namespace App\Entity;

enum Role: string
{
    case ADMIN = 'Admin';
    case PSYCHOLOGUE = 'Psychologue';
    case PATIENT = 'Patient';

    // Retourne un tableau des valeurs pour les formulaires
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    // Retourne un tableau associatif [valeur => libellé]
    public static function choices(): array
    {
        return [
            'Admin' => self::ADMIN,
            'Psychologue' => self::PSYCHOLOGUE,
            'Patient' => self::PATIENT,
        ];
    }

    // Libellé lisible en français (optionnel)
    public function label(): string
    {
        return match($this) {
            self::ADMIN => 'Administrateur',
            self::PSYCHOLOGUE => 'Psychologue',
            self::PATIENT => 'Patient',
        };
    }
}