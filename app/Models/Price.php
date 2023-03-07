<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'fragrance_id' => 'required',
        'capacit' => 'required',
        'price' => 'required',
        );
    
}
