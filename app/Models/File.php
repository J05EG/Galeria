<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'user_id'];

    //realcion muchos a uno con tabla User
    public function user(){
        return $this->belongsTo('App\User');
    }
}
