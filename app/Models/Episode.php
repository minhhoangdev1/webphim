<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['movie_id','linkphim','episode','updated_at','created_at'];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
