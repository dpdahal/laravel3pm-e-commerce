<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'parent_id', 'category_name', 'slug'];


    public  function section(){
        return $this->belongsTo(Section::class, 'section_id','id');
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany(
            Category::class,
            'parent_id',
            'id'
        );
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');

    }
}
