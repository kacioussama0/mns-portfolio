<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'thumbnail',
        'category_id',
        'description'
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
