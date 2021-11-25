<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chat';
    protected $fillable = [
        'message',
        'status',
        'pengirim',
        'penerima',
    ];

    public function User(){
        
        return $this->belongsTo('App\Models\User','id');
    }
}
