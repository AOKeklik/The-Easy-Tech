<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudies extends Model
{
    use HasFactory;
    protected $fillable = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
