<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorLocationMapModel extends Model
{
    use HasFactory;
    protected $fillable = ['location_id', 'vendor_id'];
    protected $table = 'vendor_location_map';

    public function scopeJoinVendors($query){
        $query->leftjoin('vendors', function($join) {
            $join->on('vendors.id', '=', 'vendor_location_map.vendor_id');
        });
    }
}
