<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // method category() yang merupakan relasi antara model post dengan model category
    public function Category()
    {
       return $this->belongsTo(Category::class);
    }
}
