<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Books extends Model {

    protected $table = "books";
    protected $fillable = [
        'rack_id', 'title', 'author', 'published_year'
    ];
    public function rack(){
        return $this->hasOne('App\Racks' , 'id' , 'rack_id');
    }
}
