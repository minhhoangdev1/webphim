<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits_Website extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='visits_website';
    protected $fillable=['date','visit'];
}
