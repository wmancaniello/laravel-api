<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'slug',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
