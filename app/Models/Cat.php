<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

   // protected $fillable = ['name'];
    protected $guarded = ['id'];  

    public function posts(){
        return $this->hasMany(Post::class);
    }

}
