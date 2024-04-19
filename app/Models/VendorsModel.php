<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorsModel extends Model
{
    use HasFactory;
    protected $fillable = ['company_name','api_url_code','commission'];
    protected $table = 'vendors';
}
