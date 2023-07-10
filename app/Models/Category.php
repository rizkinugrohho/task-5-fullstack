<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // method posts() yang menghubungkan relasi antara model category ke model post 
    // dimana ini merupakan penerapan relasi one to many dari table posts ke table categories
    public function Posts()
    {
       return $this->hasMany(Post::class);
    }
}
