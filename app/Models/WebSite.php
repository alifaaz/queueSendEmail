<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSite extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class,'subscribtions','web_site_id','user_id');
    }
}
