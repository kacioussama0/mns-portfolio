<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'is_published'
    ];

    public function  posts() {
        return $this->hasMany(Post::class);
    }

    public function  projects() {
        return $this->hasMany(Project::class);
    }

}
