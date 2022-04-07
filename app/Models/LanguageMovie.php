<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageMovie extends Model
{
    use HasFactory;
    protected $table='LanguageMovie';
    protected $primaryKey='Id';
    public $timestamps = false;
}
