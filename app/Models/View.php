<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='views';
    protected $fillable=['movie_id','date_view_id','view'];
}
