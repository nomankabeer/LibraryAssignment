<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Racks extends Model {

    protected $table = "racks";
    protected $fillable = [
        'name',
    ];
    protected $appends = ['total_number_of_books'];
    public function books(){
        return $this->hasMany('App\Books' , 'rack_id' , 'id');
    }
    public function gettotalNumberOfBooksAttribute(){
        return Books::where('rack_id' , $this->id)->count();
    }
}
