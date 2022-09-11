<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps=false;
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    //1 phim có nhiều thể loại
    //làm việc với table movie_genre
    public function movie_genre(){
        return $this->belongsToMany(Genre::class,'movie_genre','movie_id','genre_id');
    }

    public function movie_dir_act(){
        return $this->belongsToMany(Directors_Actors::class,'movie_dir_act','movie_id','dir_act_id');
    }

    public function episode(){
        return $this->hasMany(Episode::class)->orderBy('episode','ASC');
    }

    public function view(){
        return $this->hasMany(View::class);
    }
}
