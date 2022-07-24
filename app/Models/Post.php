<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    protected $with=['cat','user'];
    
    public function cat(){
       return  $this->belongsTo(Cat::class);
    }
    public function user(){
        return  $this->belongsTo(User::class);
     }
}
