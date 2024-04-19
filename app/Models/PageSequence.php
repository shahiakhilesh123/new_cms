<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSequence extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'page_sequences';
    public function scopeJoinState($query){
        $query->leftjoin('states', function($join) {
            $join->on('states.id', '=', 'districts.state_id');
        });
    }
}
