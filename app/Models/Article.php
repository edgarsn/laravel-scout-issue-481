<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    public function authors()
    {
        return $this->hasMany(Author::class, 'article_id');
    }

    public function shouldBeSearchable()
    {
        return true;
    }

    public function searchableAs()
    {
        return 'articles';
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
