<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function permission(){
        return $this->belongsToMany(Permissiom::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
