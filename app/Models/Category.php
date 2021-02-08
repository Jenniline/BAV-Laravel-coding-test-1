<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "image", "created_at", "updated_at"];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}

