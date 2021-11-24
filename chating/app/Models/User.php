<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    use HasFactory;
    protected $fillable = [
        'nama',
    ];

    public function pengirim(){
        
        return $this->hasMany('App\Models\Chat','pengirim');
    }

    public function penerima(){
        
        return $this->hasMany('App\Models\Chat','penerima');
    }
}
