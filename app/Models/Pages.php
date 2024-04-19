<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pages';
    public function scopeJoinCategory($query){
        $query->leftjoin('categories', function($join) {
            $join->on('categories.id', '=', 'pages.page_top_category');
        });
    }
}
