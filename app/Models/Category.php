<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory;

    protected $table = "categories"; 
    protected $primarykey  = "id";
    
    protected $fillable = [
        'title', 'slug', 'description'
    ];
    //public function getCategories()
    //{
    //   // return \DB::select("SELECT id, title, slug, description, created_at FROM categories");
    //    return \DB::table('categories')
    //     // ->select("id", "title", "slug", "description", "created_at")
    //        ->get();
           
    //}

    //public function getCategory(int $id)
    //{
       
    //   return \DB::table('categories')->find($id);
    //    // return \DB::select("SELECT id, title, slug, description, created_at FROM categories WHERE id = :id", 
    //   // ['id' => $id]);
    // }

    public function news(): BelongsToMany
    {
      return $this->belongsToMany (News::class, 'catagories_has_news', 'category_id', 'news_id');
    }

    public function newsTmp(): HasMany
    {
      return $this->hasMany(NewsTmp::class,'category_id', 'id');
    }
}
