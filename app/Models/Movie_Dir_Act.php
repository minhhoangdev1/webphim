<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_Dir_Act extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='movie_dir_act';
    protected $fillable=['dir_act_id','movie_id'];
}
