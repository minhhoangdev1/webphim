<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps=false;
    use HasFactory;

    public function movie(){
        return $this->hasMany(Movie::class)->where('status',1)->where('hide_or_show',1)->orderBy('date_updated','DESC')->orderBy('year','DESC');
    }
}
