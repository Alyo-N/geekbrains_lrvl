<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    protected $fillable = [

            'title','description','image', 'status'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'categories_has_news','news_id','category_id');
    }
}
