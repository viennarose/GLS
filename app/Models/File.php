<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $terms){
        collect(explode(" " , $terms))->filter()->each(function($term) use($query){
            $term = '%'. $term . '%';

            $query->where('description', 'like', $term)
                ->orWhere('date', 'like', $term)
                ->orWhere('hashtag', 'like', $term)
                ->orWhere('link', 'like', $term);
        });
    }
    public function resource(){
        return $this->belongsTo('App\Models\Resource');
    }
}
