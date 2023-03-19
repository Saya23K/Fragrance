<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fragrance extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');

    public static $rules = array(
        'm_brand_id' => 'required',
        'fragrance' => 'required',
        // 'comment' => 'required',
        // 'kind' => 'required',
        // 'image_path' => 'required',
        );
}
