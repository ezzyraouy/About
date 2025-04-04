<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    use SoftDeletes;
    protected $fillable = [
        'title_fr','description_fr','image','video','link','github_link','title_en','title_de','description_en','description_de',
    ];

    public function images()
    {
        return $this->hasMany(Image::class,'project_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)
                    ->using(CategoryProject::class)
                    ->withTimestamps();
    }
}