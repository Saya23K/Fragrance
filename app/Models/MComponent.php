<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MComponent extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');

    public static $rules = array(
        'component' => 'required',
        // 'component_comment' => 'required',
    );
    
}
