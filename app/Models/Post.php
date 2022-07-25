<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=["title"];
    public function authors(){
        return $this->belongsToMany(User::class);
    }

    public function website(){
        return $this->belongsTo(WebSite::class);
    }
}
