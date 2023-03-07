<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');

    public static $rules = array(
        'fragrance_id' => 'required',
        'm_component_id' => 'required',
        'note' => 'required',
    );
}
