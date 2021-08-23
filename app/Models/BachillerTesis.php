<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BachillerTesis extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['bachiller_id', 'tesis_id'];    
}
