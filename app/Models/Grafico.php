<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grafico extends Model
{
    use HasFactory;

    public static function getBarBackground($minimo, $satisfactorio, $sobresaliente, $valor)
    {
        if ($valor <= $minimo) {
            return self::getRed();
        } elseif ($valor <= $satisfactorio) {
            return self::getYellow();
        } elseif ($valor <= $sobresaliente) {
            return self::getGreen();
        }
        return self::getBlue();
    }

    public static function getRed()
    {
        return "#FDA4AF"; // Rojo - Tailwind: rose-300
    }

    public static function getGreen()
    {
        return "#86EFAC"; // Verde - Tailwind: green-300
    }

    public static function getBlue()
    {
        return "#7DD3FC"; // Azul - Tailwind: sky-300
    }

    public static function getYellow()
    {
        return "#FCD34D"; // Yellow - Tailwind: amber-300
    }
}
