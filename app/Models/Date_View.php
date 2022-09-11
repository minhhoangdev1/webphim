<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date_View extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='date_view';
    protected $fillable=['date'];
    
    public function view(){
        return $this->hasMany(View::class,'date_view_id')->orderBy('view','DESC');
    }
}
