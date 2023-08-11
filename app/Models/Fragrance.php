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
        'comment' => 'required',
        'kind' => 'required',
        'capacity' => 'required',
        'price' => 'required',
        // 'image_path' => 'required',
        );

    
     public function brand()
    {
        return $this->belongsTo('App\Models\MBrand','m_brand_id');

    }
    
     public function components()
    {
        return $this->hasMany('App\Models\Component');

    }
    
     public function top_components()
    {
        return $this->hasMany('App\Models\Component')->where('note',1);

    }
    
     public function middle_components()
    {
        return $this->hasMany('App\Models\Component')->where('note',2);

    }
    
     public function last_components()
    {
        return $this->hasMany('App\Models\Component')->where('note',3);

    }
    
}

